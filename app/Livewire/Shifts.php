<?php

namespace App\Livewire;

use App\Models\Shifts as ModelsShifts;
use Carbon\Carbon;
use Livewire\Component;

class Shifts extends Component
{
    public $room;
    public $areas;

    public function mount($room, $areas)
    {
        $this->room = $room;
        $this->areas = $areas;
    }

    public function render()
    {
        return view('livewire.shifts')->with([
            'shifts' => ModelsShifts::where('status', 'call')->whereIn('area', array_values($this->areas))->whereDate('created_at', Carbon::today())->orderBy('id','DESC')->limit(5)->get()
        ]);
    }
}
