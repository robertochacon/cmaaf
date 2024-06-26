<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Areas;
use App\Models\Rooms;
use App\Models\Services;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $navigationGroup = 'Usuarios';

    protected static ?string $navigationLabel = 'Usuarios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->required()->email(),
                    TextInput::make('password')->required()->password()->hiddenOn('edit'),
                    Select::make('type')
                    ->label('Tipo de usuario')
                    ->options([
                        'doctor' => 'Doctor',
                        'admin' => 'Administrador',
                        'super' => 'Super Administrador',
                    ])
                    ->searchable(),
                ])
                ->columns(2),
                Section::make()
                ->schema([
                    Select::make('room')
                    ->label('Sala')
                    ->options(Rooms::all()->pluck('name','name'))
                    ->searchable(),
                    TextInput::make('window')
                    ->label('Posición')
                    ->required(),
                ])
                ->columns(2),
                Section::make()
                ->schema([
                    Select::make('areas')
                    ->label('Areas')
                    ->multiple()
                    ->options(Areas::all()->pluck('name','name'))
                    ->searchable(),
                    Select::make('services')
                    ->multiple()
                    ->label('Servicios/Especialidades')
                    ->options(Services::all()->pluck('name', 'name'))
                    ->searchable(),
                ])
                ->columns(2)
                // Toggle::make('status')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')
                ->searchable(),
                TextColumn::make('email')->label('Email')
                ->searchable(),
                TextColumn::make('areas')->label('Areas')->default('N/A')->limit(15),
                TextColumn::make('services')->label('Servicios')->default('N/A')->limit(15),
                TextColumn::make('created_at')->since()->label('Creado'),
                // ToggleColumn::make('status')->label('Estado')
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ManageUsers::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isSuper();
    }

}
