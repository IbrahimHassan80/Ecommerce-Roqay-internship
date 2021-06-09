<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\validate_add_category;
use App\Http\Requests\validate_admin_login;
use App\Http\Requests\validate_add_user;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use App\Models\Admin\category;
use Spatie\Permission\Models\Role;
class dashboard_controller extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    
    public function show_login()
    {
        return view('admin.login');
    }
    
    public function check_admin_login(validate_admin_login $request){
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
		{
    		return redirect()->route('admin.dashboard');
    	} 
    	else {
    		return redirect()->route('admin.show.login')->with(['failed'=>'wrong email or oassword']);
    	    }
        
    
    }
   
    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('admin.show.login');
    }


}
