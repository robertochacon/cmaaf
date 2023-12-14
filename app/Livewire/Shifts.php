<?php

namespace App\Livewire;

use App\Models\Shifts as ModelsShifts;
use Carbon\Carbon;
use Livewire\Component;

class Shifts extends Component
{
    public function render()
    {
        return view('livewire.shifts')->with([
            'shifts' => ModelsShifts::whereDate('created_at', Carbon::today())->orderBy('id','DESC')->limit(5)->get()
        ]);
    }
}
