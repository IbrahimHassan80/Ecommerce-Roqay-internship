<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\validate_add_user;
class usersController extends Controller
{
  
      public function index(Request $request)
      {
      $data = User::orderBy('id','DESC')->paginate(5);
      return view('admin.users.show_user',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
      }

      public function create()
      {
      
      $data = User::all();
      return view('admin.users.add_user', compact('data'));
      
      }

      public function store(validate_add_user $request)
      {
          /// store AJaxx ///
          
         ///  save  photo  ///
          $file_extension = $request -> photo->getclientoriginalExtension();
          $file_name = time() . '.' . $file_extension;
          $path = 'admin/users';
          $request->photo->move($path, $file_name);

          $user = User::create([
             'photo'  => $file_name,
             'name'   => $request->name,
             'email'  => $request->email,
             'mobile' => $request->mobile,
             'password' => Hash::make($request->password),
         ]);

         if($user){
          return response() -> json([
              'status' => true,
              'msg'    => 'Saved succesfully',
              'name'  => $request->name
          ]);
          } else {
           return response() -> json([
              'status' => false,
              'msg'    => 'problem found',
              ]);
         }

      }

      public function show($id)
      {
      $user = User::find($id);
      return view('users.show',compact('user'));
      }

      public function edit($id)
      {
      $user = User::find($id);
        return view('admin.users.edit_user',compact('user'));

      }

      public function update(Request $request)
      {
        $user = User::find($request->user_id);
        
        // save photo //
        $file_extension = $request -> photo->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'admin/users';
        $request->photo->move($path, $file_name);

 
        $data['name']          =  $request->name;
        $data['email']         =  $request->email;
        $data['mobile']        =  $request->mobile;
        $data['password']      =  Hash::make($request->password);
        $data['photo']         =  $file_name;       
   
        $update = $user->update($data);
    
        if($update){
        return response() -> json([
            'status' => true,
            'msg'    => 'Saved succesfully',
        ]);
       } else {
        return response() -> json([
            'status' => false,
            'msg'    => 'problem found',
            ]);
       }

}

    public function destroy(Request $request)
    {
    $user = User::find($request->id);
    if($user){
    $user->delete();
      
     return response()->json([
          'msg' => 'deleted',
          'id'  => $request->id
      ]);
      }
  }


}
