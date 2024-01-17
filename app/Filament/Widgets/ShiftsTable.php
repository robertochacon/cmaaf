<?php

namespace App\Filament\Widgets;

use App\Models\Shifts;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ShiftsTable extends BaseWidget
{
    protected static ?string $heading = 'Ultimos turnos';

    public function table(Table $table): Table
    {
        return $table
        ->query(Shifts::query())
        ->defaultSort('created_at', 'desc')
        ->columns([
            TextColumn::make('code')
            ->label('Codigo'),
            TextColumn::make('status_spanish')
            ->badge()
            ->label('Estado')
            ->color(fn (string $state): string => match ($state) {
                'En espera' => 'success',
                'Sin atender' => 'success',
                'Llamando' => 'info',
                'Cancelado' => 'danger',
            }),
            TextColumn::make('created_at')->since()
            ->label('Fecha'),
        ]);
    }

}
