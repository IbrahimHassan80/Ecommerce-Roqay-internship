<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class livewirecontroller extends Controller
{
    public function test(){
        return view('livewhire');
    }

    public function showtasks(){
        return view('admin.tasks.add_task');
    }

}
