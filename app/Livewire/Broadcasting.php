<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Broadcasting extends Component
{
    public function render()
    {
        $key = 'broadcasting';
        $event = Cache::get($key);

        if ($event) {
            Cache::forget($key);
            $this->emit('broadcasting', $event);

            $this->dispatchBrowserEvent('notify');
            dd('test');
        }


        return <<<'HTML'
        <div wire:poll.1s></div>
        HTML;
    }
}
