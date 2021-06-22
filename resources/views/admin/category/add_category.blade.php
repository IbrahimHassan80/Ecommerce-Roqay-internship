@extends('admin.layout.index')
@section('content')
@section('title','Category')
    @can('edit')
    <form method="post" action="{{route('category.store')}}" class="col-md-6" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col">
            <input name="name_ar" type="text" class="form-control" placeholder="name_ar">
            @error('name_ar')
            <span class="text-danger">{{$message}} </span>
           @enderror
          </div>
          
          <div class="col">
            <input type="text" name="name_en" class="form-control" placeholder="name_en">
            @error('name_en')
            <span class="text-danger">{{$message}} </span>
           @enderror
          </div>
        </div>
        
        <div class="form-group">
            <label style="font-weight:bold;" for="exampleFormControlFile1">photo</label>
            <input name="photo" type="file" class="form-control-file btn btn-success" id="exampleFormControlFile1">
            @error('photo')
            <span class="text-danger">{{$message}} </span>
           @enderror
          </div>
       
          <button class="btn btn-primary">add category</button>
       
        @if(Session::has('success'))
            <div class="alert alert-primary" role="alert">
             {{Session::get('success')}}
            </div>
        @endif
      
    </form>
    @endcan
    {{-- ---------------------------------------------- --}}
      <div class="app-content content">
        <div class="content-wrapper">
           
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-content collapse show">
              <div class="card-body card-dashboard">
                  <table
                      class="table display nowrap table-striped table-bordered scroll-horizontal">
                      <thead>
                      <tr>
                          <th>name ar</th>
                          <th>name en</th>
                          <th>صورة القسم</th>
                          <th>الإجراءات</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($category as $cat)      
                        <tr>
                            <td>{{$cat->name_ar}}</td>
                             <td>{{$cat->name_en}}</td>
                             <td><img style="width: 100px;height: 100px" src="{{asset('admin/category/'.$cat->photo)}}"></td>
                             <td>
                              <div class="btn-group" role="group"
                                  aria-label="Basic example">
                                 <a href="{{route('category.edit', $cat->id)}}"
                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                    @role('admin')
                                    <form action="{{route('category.destroy', $cat->id)}}" method="POST">
                                        @csrf 
                                        @method('Delete')
                                     <button class="btn btn-danger">حذف</button>
                                    </form>    
                                    @endrole
                                </div>
                             </td>
                          </tr>
                              @endforeach
                      </tbody>
                  </table>

                    </div>
                </div>
            </div>
         </div>
      </div>
     </section>
     </div>
     </div>
    </div>
    @stop