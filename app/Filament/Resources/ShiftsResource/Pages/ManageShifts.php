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
    //         'LLamados' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'call'))
    //             ->badge(Shifts::query()->where('status', 'call')->count()),
    //         'En espera' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'wait'))
    //             ->badge(Shifts::query()->where('status', 'wait')->count()),
    //         'Completados' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'done'))
    //             ->badge(Shifts::query()->where('status', 'done')->count()),
    //         'Cancelados' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'cancel'))
    //             ->badge(Shifts::query()->where('status', 'cancel')->count()),
    //     ];
    // }

    // public function getDefaultActiveTab(): string | int | null
    // {
    //     return 'En espera';
    // }

}
