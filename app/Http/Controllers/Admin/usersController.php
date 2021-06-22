<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Usernumber;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\validate_add_user;
class usersController extends Controller
{
  
      public function index(Request $request)
      {
      $data = User::select('name','email','photo')->orderBy('id','DESC')->get();
    
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
             'password' => Hash::make($request->password),
         ]);
            foreach($request->mobile as $phone){
              $number = Usernumber::create([
                'mobile'=>  $phone,
                'user_id'=> $user->id,
                ]);
            }
         

         if($user){

          return response() -> json([
              'status' => true,
              'msg'    => 'Saved succesfully',
              'id'  => $user->id,
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

      public function update(validate_add_user $request)
      {
        $user = User::find($request->user_id);
        
        // delete old photo //
        if(isset($request->photo)){
          if(File::exists(public_path('admin/users/' . $user->photo))){
          File::delete(public_path('/admin/users/'. $user->photo));}  
       
        $file_extension = $request -> photo->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'admin/users';
        $request->photo->move($path, $file_name);
        }
 
        $data['name']          =  $request->name;
        $data['email']         =  $request->email;
        $data['password']      =  Hash::make($request->password);
        $data['photo']         =  $request->photo ? $file_name : $user->photo;       
   
        $update = $user->update($data);

        // delete old num and store new //
        if(isset($request->mobile)){
        Usernumber::where('user_id',$request->user_id)->delete();
        foreach($request->mobile as $phone){
          $number = Usernumber::create([
            'mobile'=>  $phone,
            'user_id'=> $request->user_id,
            ]);
          }
        }
        
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
        // delete Ajax //
    $user = User::find($request->id);
    if(!$user){
      return response()->json([
        'msg' => 'id mot found',]);
    }
    
    if($user){
    File::delete(public_path('/admin/users/'. $user->photo));
    $user->delete();
      
     return response()->json([
          'msg' => 'deleted',
          'id'  => $request->id
      ]);
      }
  }
  public function deletenumber(Request $request){
    $num = Usernumber::find($request->id);
    if(!$num){
      return response()->json([
        'msg' => 'id mot found',]);
    }
    if($num){
      $num->delete();
      return response()->json([
          'msg' => 'deleted',
          'id'  => $request->id
      ]);

    }

  }

}
