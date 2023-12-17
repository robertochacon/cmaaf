<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftsResource\Pages;
use App\Filament\Resources\ShiftsResource\RelationManagers;
use App\Models\Areas;
use App\Models\Rooms;
use App\Models\Services;
use App\Models\Shifts;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                ->options(Services::all()->pluck('name'))
                ->searchable(),
                Select::make('room')
                ->label('Sala')
                ->options(Rooms::all()->pluck('name'))
                ->searchable(),
                Select::make('area')
                ->label('Area')
                ->options(Areas::all()->pluck('name'))
                ->searchable(),
                TextInput::make('window')->label('Posición')->numeric(),
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
                TextColumn::make('service')
                ->default('N/A')
                ->label('Servicio'),
                TextColumn::make('room')
                ->default('N/A')
                ->label('Sala'),
                TextColumn::make('area')
                ->default('N/A')
                ->label('Area'),
                TextColumn::make('window')
                ->default('N/A')
                ->label('Posición'),
                TextColumn::make('created_at')
                ->since()
                ->label('Creado'),
            ])
            ->poll('5s')
            ->deferLoading()
            ->filters([
                //
            ])
            ->actions([
                Action::make('Llamar')
                ->action(function (Shifts $record, array $data): void {

                    event(new BroadcastEvent($record->code));

                }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
