<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\validate_add_category;
use App\Models\Admin\category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class categoryController extends Controller
{
  
    public function index()
    {

    }

    public function create()
    {
        $category = category::select('name_ar', 'name_en', 'photo', 'id')->orderBy('id','desc')->get();
        return view('admin.category.add_category', compact('category'));
    }

 
    public function store(validate_add_category $request)
    {
        $file_extension = $request -> photo->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'admin/category';
        $request->photo->move($path, $file_name);
        
        category::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
            return redirect()->route('category.create')->with(['success' => 'Saved Succesfully']);
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $category = category::find($id);
        if(!$category)
            return redirect()->route('category.create');
            // ---
            return view('admin.category.edit_category', compact('category'));
    }



    public function update(validate_add_category $request, $id)
    {
        $category = category::find($id);
        if(!$category)
            return redirect()->route('category.create');
    
            if(isset($request->photo)){
                
             if(File::exists(public_path('admin/category/' . $category->photo))){
               File::delete(public_path('/admin/category/'. $category->photo));}  

            $file_extension = $request -> photo->getclientoriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'admin/category';
            $request->photo->move($path, $file_name);
            }
            
            $category->update([
                'photo' =>   $request->photo ? $file_name : $category->photo,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
            ]);
             return redirect()->route('category.create')->with(['success' => 'edited Succesfully']);
    
        }

  

    public function destroy($id)
    {
        $category = category::find($id);
        if(!$category)
            return redirect()->route('category.create');

            if(File::exists(public_path('admin/category/' . $category->photo))){
                File::delete(public_path('/admin/category/'. $category->photo));}  

            $category->delete();
            return redirect()->route('category.create')->with(['deleted sucessfully']);
        
    }
}
