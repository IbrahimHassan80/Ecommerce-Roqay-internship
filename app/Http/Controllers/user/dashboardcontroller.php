<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use App\Models\Admin\product;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboard(){
        $category = product::select('id','name','photo','description','price')->get();
        return view('user.products.product', compact('category'));
    }
}
