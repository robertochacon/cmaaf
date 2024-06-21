<?php

namespace App\Filament\Resources\ShiftsResource\Pages;

use App\Filament\Resources\ShiftsResource;
use App\Models\Shifts;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageShifts extends ManageRecords
{
    protected static string $resource = ShiftsResource::class;

    protected static ?string $title = 'Turnos';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()->label('Crear turno')
            // ->hidden(auth()->user()->isDoctor()),
        ];
    }

    // public function getTabs(): array
    // {
    //     return [
    //         'Todos' => Tab::make()
    //             ->badge(Shifts::query()->count()),
    //         'Preferenciales' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('area', 'Preferencial'))
    //             ->badge(Shifts::query()->where('area', 'Preferencial')->count()),
    //         'Laboratorio' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('area', 'Laboratorio'))
    //             ->badge(Shifts::query()->where('area', 'Laboratorio')->count()),
    //         'Imágenes' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('area', 'Imágenes'))
    //             ->badge(Shifts::query()->where('area', 'Imágenes')->count()),
    //         'Consultas' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('area', 'Consultas'))
    //             ->badge(Shifts::query()->where('area', 'Consultas')->count()),
    //         'Resultados' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('area', 'Resultados'))
    //             ->badge(Shifts::query()->where('area', 'Resultados')->count()),
    //     ];
    // }

    // public function getDefaultActiveTab(): string | int | null
    // {
    //     return 'En espera';
    // }

}
