<?php

namespace App\Filament\Resources\ShiftsResource\Pages;

use App\Filament\Resources\ShiftsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageShifts extends ManageRecords
{
    protected static string $resource = ShiftsResource::class;

    protected static ?string $title = 'Turnos';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear turno'),
        ];
    }
}
