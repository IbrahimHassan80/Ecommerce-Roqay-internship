<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\user_login_request;

class logincontroller extends Controller
{
    public function show_login(){
        return view('user.login-register.login');
    }

    public function check_login(user_login_request $request){
        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
		{
    		return redirect()->route('user.dash.index');
    	} 
    	else {
    		return redirect()->route('user.login')->with(['failed'=>'wrong email or oassword']);
    	    }

    }


    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('user.login');
    }
}
