<?php

namespace App\Filament\Resources;

use App\Events\BroadcastingEvent;
use App\Events\Turns;
use App\Filament\Resources\ShiftsResource\Pages;
use App\Filament\Resources\ShiftsResource\RelationManagers;
use App\Models\Areas;
use App\Models\Rooms;
use App\Models\Services;
use App\Models\Shifts;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ShiftsResource extends Resource
{
    protected static ?string $model = Shifts::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationGroup = 'Turnos';

    protected static ?string $navigationLabel = 'Turnos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('identification')->label('Cédula'),
                TextInput::make('patient_name')->label('Nombre'),
                Select::make('service')
                ->label('Servicios')
                ->options(Services::all()->pluck('name','name'))
                ->searchable(),
                Select::make('room')
                ->label('Sala')
                ->options(Rooms::all()->pluck('name','name'))
                ->searchable(),
                Select::make('area')
                ->label('Area')
                ->options(Areas::all()->pluck('name','name'))
                ->searchable()
                ->live()
                ->afterStateUpdated(function ($state, callable $set){
                    $totalToday = Shifts::where('area', $state)->whereDate('created_at', Carbon::today())->count();
                    $code = strtoupper(substr($state, 0, 3)).'-'.($totalToday+1);
                    $set('code', $code);
                }),
                TextInput::make('window')->label('Posición')->numeric(),
                TextInput::make('code'),
                Select::make('status')
                ->label('Estado')
                ->options([
                    'call' => 'LLamando',
                    'wait' => 'Es espera',
                    'wait_doctor' => 'Es espera de un doctor',
                    'done' => 'Completado',
                    'cancel' => 'Cancelado',
                ]),
                Toggle::make('insurance')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                ->default('N/A')
                ->label('Codigo')
                ->weight('bold')
                ->searchable(),
                // TextColumn::make('identification')
                // ->default('N/A')
                // ->label('Cédula')
                // ->searchable(),
                // TextColumn::make('patient_name')
                // ->default('N/A')
                // ->label('Nombre')
                // ->searchable(),
                TextColumn::make('service')
                ->default('N/A')
                ->label('Servicio'),
                TextColumn::make('room')
                ->default('N/A')
                ->label('Sala'),
                TextColumn::make('area')
                ->default('N/A')
                ->label('Area')
                ->toggleable(isToggledHiddenByDefault: true)
                ->hidden(auth()->user()->isDoctor()),
                TextColumn::make('window')
                ->default('N/A')
                ->label('Posición')
                ->toggleable(isToggledHiddenByDefault: true)
                ->hidden(auth()->user()->isDoctor()),
                TextColumn::make('created_at')
                ->since()
                ->label('Creado')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status_spanish')
                ->badge()
                ->label('Estado')
                ->color(fn (string $state): string => match ($state) {
                    'En espera' => 'success',
                    'Sin atender' => 'success',
                    'Llamando' => 'info',
                    'Cancelado' => 'danger',
                }),
                ToggleColumn::make('insurance')
                ->label('Seguro')
            ])
            ->poll('60s')
            ->filters([
                //
            ])
            ->actions([
                Action::make('Llamar')
                ->action(function (Shifts $record, array $data): void {

                    $position = auth()->user()->window;
                    $room = auth()->user()->room;

                    $data = [
                        'patient_name' => $record->patient_name,
                        'room' => $room,
                        'code' => $record->code,
                        'position' => $position,
                    ];

                    event(new BroadcastingEvent($data));

                    Notification::make()
                    ->title('El turno '.$record->code.' se esta solicitando.')
                    ->info()
                    ->send();

                    $shift = Shifts::find($record->id);
                    $shift->room = $room;
                    $shift->window = $position;
                    $shift->status = 'call';
                    $shift->save();

                })
                ->icon('heroicon-m-speaker-wave')
                ->color('info')
                ->button()
                ->labeledFrom('lg'),
                Action::make('Atendido') //from admin or super
                ->action(function (Shifts $record, array $data): void {

                    $record->update(['status' => 'wait_doctor']);

                    Notification::make()
                    ->title('El turno '.$record->code.' fue atendido.')
                    ->success()
                    ->send();

                })
                ->icon('heroicon-m-check-circle')
                ->color('warning')
                ->button()
                ->labeledFrom('lg')
                ->visible(fn (Shifts $record) => !is_null($record->service))
                ->hidden(auth()->user()->isDoctor()),
                Action::make('Completado') //from doctor
                ->action(function (Shifts $record, array $data): void {

                    Notification::make()
                    ->title('El turno '.$record->code.' fue atendido.')
                    ->success()
                    ->send();

                    $record->delete();

                })
                ->icon('heroicon-m-check-circle')
                ->color('warning')
                ->button()
                ->labeledFrom('lg')
                ->hidden(!auth()->user()->isDoctor()),
                Tables\Actions\EditAction::make()
                ->button()
                ->hidden(auth()->user()->isDoctor()),
                Tables\Actions\DeleteAction::make()
                ->requiresConfirmation()
                ->button(),
            ])
            ->headerActions([
                Action::make('refresh')
                    ->label('Actualizar lista')
                    ->color('info')
                    ->action(function ($livewire){

                        $livewire->resetTable();

                        Notification::make()
                        ->title('Lista de turno actualizada.')
                        ->info()
                        ->send();

                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageShifts::route('/'),
        ];
    }

    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::whereIn('status', ['call','wait'])->count();
    // }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        if ($user->isSuper()) {
            return parent::getEloquentQuery();
        }

        $query = parent::getEloquentQuery()->whereDate('created_at', Carbon::today());

        if ($user->isAdmin()) {
            $query->whereIn('area', array_values($user->areas))
                ->where(function ($query) {
                    $query->whereNull('service')
                        ->where('status', 'call')
                        ->orWhere('status', 'wait');
                });
        } elseif ($user->isDoctor()) {
            $query->whereIn('status', ['wait_doctor'])
                ->orWhereIn('service', array_values($user->services));
        }

        return $query;
    }

}
