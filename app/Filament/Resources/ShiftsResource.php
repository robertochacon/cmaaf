<?php

namespace App\Filament\Resources;

use App\Events\BroadcastingEvent;
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
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                ->default('N/A')
                ->label('Codigo')
                ->searchable(),
                TextColumn::make('identification')
                ->default('N/A')
                ->label('Cédula')
                ->searchable(),
                SelectColumn::make('service')
                ->label('Servicio')
                ->options(Services::all()->pluck('name','name'))
                ->searchable(),
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
            ])
            ->poll('5s')
            ->deferLoading()
            ->filters([
                //
            ])
            ->actions([
                Action::make('Llamar')
                ->action(function (Shifts $record, array $data): void {

                    $position = auth()->user()->window;
                    $room = auth()->user()->room;

                    $data = [
                        'room' => $room,
                        'code' => $record->code,
                        'position' => $position,
                    ];

                    event(new BroadcastingEvent($data));

                    $shift = Shifts::find($record->id);

                    if ($shift->status==='wait') {
                        $shift->room = $room;
                        $shift->window = $position;
                        $shift->status = 'call';
                        $shift->save();
                    }

                })
                ->icon('heroicon-m-speaker-wave')
                ->color('info')
                ->button()
                ->labeledFrom('lg'),
                Action::make('Atendido')
                ->action(function (Shifts $record, array $data): void {

                    $shift = Shifts::find($record->id);
                    $shift->status = 'wait';
                    $shift->save();

                })
                ->icon('heroicon-m-check-circle')
                ->color('success')
                ->button()
                ->labeledFrom('lg')
                ->hidden(!auth()->user()->isAdmin()),
                Tables\Actions\EditAction::make()
                ->button()
                ->hidden(auth()->user()->isDoctor()),
                Tables\Actions\DeleteAction::make()
                ->button()
                ->hidden(auth()->user()->isDoctor()),
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', ['call','wait'])->count();
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->isSuper()) {
            return parent::getEloquentQuery();
        }else if (auth()->user()->isAdmin()) {
            return parent::getEloquentQuery()->where('service', null)->where('status', 'wait');
        }else if (auth()->user()->isDoctor()) {

            $services = auth()->user()->services;
            $result = parent::getEloquentQuery();

            foreach ($services as $key => $value) {
                $result->orWhere('service', $value);
            }

            return $result;

        }
    }

}
