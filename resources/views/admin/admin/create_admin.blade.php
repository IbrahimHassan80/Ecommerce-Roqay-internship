@extends('admin.layout.index')
@section('title','Add admins')
@section('content')

    <form method="POST" action="{{route('admin.store')}}" class="col-md-6">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">name</label>
            <input name="name" id="username" type="text" class="form-control" placeholder="name">
      
            <span id="name_error" class="text-danger"> </span>
        
          </div>
          
          <div class="col">
            <label for="email">email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="email">
           
            <span id="email_error" class="text-danger"> </span>
       
          </div>
          
          <div class="col">
            <label for="password">password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="password">
            
            <span id="password_error" class="text-danger"> </span>
            
          </div>
          
          <div class="col">
            <label for="role">add role</label>
            <select name="role" class="form-select" multiple aria-label="multiple select example">
              @foreach($role as $roles)
              <option  value="{{$roles->id}}">{{$roles->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col">
            <label for="role">permission</label>
            <select name="permission" class="form-select" multiple aria-label="multiple select example">
              @foreach($Permission as $permessions)
              <option  value="{{$permessions->id}}">{{$permessions->name}}</option>
              @endforeach
            </select>
          </div>

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