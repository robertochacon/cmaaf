<?php

namespace App\Filament\Resources\RoomsResource\Pages;

use App\Filament\Resources\RoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRooms extends ManageRecords
{
    protected static string $resource = RoomsResource::class;

    protected static ?string $title = 'Salas';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear sala'),
        ];
    }
}
