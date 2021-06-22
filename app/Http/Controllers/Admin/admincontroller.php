<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::select('id','name','email',)->orderBy('id','DESC')->get();
        return view('admin.admin.show_admin', compact('data'))->with(['var' => 1]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
    $role = Role::select('name', 'id')->get();
    $Permission = Permission::select('name', 'id')->get();
    return view('admin.admin.create_admin', compact('role','Permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //   return $role = Admin::role('admin')->get();
       
        $admin = admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if($request->role){
        $role = Role::find($request->role);
        $admin->assignRole($role);
        }

        if($request->permission){
            $Permission = Permission::find($request->permission);
            $admin->givePermissionTo($Permission);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if(!$admin)
        return ('not found');

        $admin->delete();
        return back();
    }
}
