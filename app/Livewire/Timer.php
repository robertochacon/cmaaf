<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Timer extends Component
{
    public function render()
    {
        $date['date'] = Carbon::now()->format('d-m-Y');
        $date['hour'] = Carbon::now()->format('H:i:m');

        return view('livewire.timer')->with([
            'date' => $date
        ]);
    }
}
