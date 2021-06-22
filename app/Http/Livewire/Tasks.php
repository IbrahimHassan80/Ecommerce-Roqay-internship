<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Task;
use Livewire\WithPagination;
class Tasks extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['taskAdded' => '$refresh'];
    public function render()
    {
        $task = Task::select('id','title')->latest()->paginate(5);
        $counttask = Task::count();
        return view('livewire.tasks', compact('task', 'counttask'));
    }
}
