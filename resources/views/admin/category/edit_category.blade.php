@extends('admin.layout.index')
@section('content')
@section('title','Edit Category')
<form method="post" action="{{route('category.update', $category->id)}}" class="col-md-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      
      <div class="col">
        <input name="name_ar" value="{{$category->name_ar}}" type="text" class="form-control" placeholder="name_ar">
        @error('name_ar')
        <span class="text-danger">{{$message}} </span>
       @enderror
      </div>
      <input type="hidden" name="null" value="{{$category->name_ar}}">
      <div class="col">
        <input type="text" value="{{$category->name_en}}" name="name_en" class="form-control" placeholder="name_en">
        @error('name_en')
        <span class="text-danger">{{$message}} </span>
       @enderror
      </div>
    
    </div>
    
    <div class="form-group">
       
      {{-- old image --}}
      <img style="width: 100px;height: 100px" src="{{asset('admin/category/'.$category->photo)}}">
  
        <label style="font-weight:bold;" for="exampleFormControlFile1">edit photo</label>
        <input name="photo" type="file" class="form-control-file btn btn-success" id="exampleFormControlFile1">
        @error('photo')
        <span class="text-danger">{{$message}} </span>
       @enderror
      
      </div>
    
      <button class="btn btn-primary">edit category</button>
    
      @if(Session::has('success'))
    <div class="alert alert-primary" role="alert">
      {{Session::get('success')}}
    
    </div>
    @endif
  </form>
@stop