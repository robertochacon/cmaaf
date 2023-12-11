<?php

namespace App\Filament\Resources\AreasResource\Pages;

use App\Filament\Resources\AreasResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAreas extends ManageRecords
{
    protected static string $resource = AreasResource::class;

    protected static ?string $title = 'Areas';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear area'),
        ];
    }
}
