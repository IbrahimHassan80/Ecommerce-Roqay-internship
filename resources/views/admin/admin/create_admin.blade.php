@extends('admin.layout.index')
@section('title','Add admins')
@section('content')

    <form method="post" id="userSave" action="{{route('users.store')}}" class="col-md-6" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <input name="name" id="username" type="text" class="form-control" placeholder="name">
      
            <span id="name_error" class="text-danger"> </span>
        
          </div>
          
          <div class="col">
            <input type="email" id="email" name="email" class="form-control" placeholder="email">
           
            <span id="email_error" class="text-danger"> </span>
       
          </div>
          
          <div class="col">
            <input type="password" id="password" name="password" class="form-control" placeholder="password">
            
            <span id="password_error" class="text-danger"> </span>
            
          </div>
          
          {{-- <div class="col">
            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="mobile">
          
            <span id="mobile_error" class="text-danger"> </span>
          </div> --}}

        </div>
       
          <button id="btn-click" class="btn btn-primary">add admin</button>
        
        @if(Session::has('success'))
        <div class="alert alert-primary" role="alert">
          {{Session::get('success')}}
        </div>
        @endif
       
        <div class="alert alert-success" id="success-msg" style="display: none">
            تم الحفظ بنجاح
        </div>
        <div class="alert alert-danger" id="deleted-msg" style="display: none">
            تم الحذف بنجاح
        </div>
    
    </form>
    @stop