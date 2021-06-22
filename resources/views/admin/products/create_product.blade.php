@extends('admin.layout.index')
@section('title','Add product')
@section('content')

<form class="" method="post" id="" action="{{route('product.store')}}" class="col-md-6" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col">
        <input name="name" id="username" type="text" class="form-control" placeholder="name">
        <span id="name_error" class="text-danger"> </span>
      </div>
      
      <div class="col">
        <input type="text"  name="price" class="form-control" placeholder="price">
        
      </div>
      
      <div class="col">
        <label for="">category</label>
        <select name="category" id="">
            @foreach($category as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
      </div>
      
      <div class="field_wrapeer">
        <input type="text" name="description" class="form-control" placeholder="description">
      
      </div>
    </div>
    
    <div class="form-group">
        <label style="font-weight:bold;" for="exampleFormControlFile2">photo</label>
        <input name="photo" id="file" type="file" class="form-control" id="exampleFormControlFile2">
        <span id="photo_error" class="text-danger"> </span>
      </div>
   
      <button id="btn-click" class="btn btn-primary">add user</button>
    
    @if(Session::has('success'))
   
    <div class="alert alert-primary" role="alert">
      {{Session::get('success')}}
    </div>
    @endif
   
</form>

@endsection