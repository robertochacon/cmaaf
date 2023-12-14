<?php

namespace App\Filament\Resources\ServicesResource\Pages;

use App\Filament\Resources\ServicesResource;
use App\Models\Services;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageServices extends ManageRecords
{
    protected static string $resource = ServicesResource::class;

    protected static ?string $title = 'Servicios';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Crear servicio'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Todos' => Tab::make()
                ->badge(Services::query()->count()),
            'Imagen' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'image'))
                ->badge(Services::query()->where('type', 'image')->count()),
            'Laboratorio' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'laboratory'))
                ->badge(Services::query()->where('type', 'laboratory')->count()),
            'Consulta' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'consultation'))
                ->badge(Services::query()->where('type', 'consultation')->count()),
        ];
    }
}
