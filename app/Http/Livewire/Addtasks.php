<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Task;
class Addtasks extends Component
{
    public $title;
    protected $rules = [
        'title' => 'required|min:3',
    ];



    public function render()
    {
        return view('livewire.addtasks');
    }


    public function addTask(){
        $this->validate();
        $task = Task::create([
            'title' => $this->title,
        ]);
        $this->title = "";
        $this->emit('taskAdded');
        session()->flash('message', 'Task Was Added Successfuly !');
    }

}
