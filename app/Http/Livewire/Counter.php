<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $num = 10;
    public $name = 'ahmed';
    public function render()
    {
        return view('livewire.counter');
    }

    public function add(){
        $this->num++;
    }

}