<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function render()
    {
        return view('livewire.counter');
        // return view('livewire.counter', ['counter' => $this->count]);
    }

    public function increment()
    {
        // dd('Hellow World');

        $this->count++;
    }

    public function decrement()
    {
        #code
    }
}
