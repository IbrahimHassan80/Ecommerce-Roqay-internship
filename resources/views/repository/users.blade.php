@extends('admin.layout.index')
@section('title','repository Users')
@section('content')

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
   <th>name </th>
   <th>email</th>
   <th>الحالة</th>
   <th>صورة القسم</th>
   <th>الإجراءات</th>
</tr>
</thead>

<tbody>
   @foreach($users as $user)
<tr class="user_id_{{$user->id}}">
  <td>{{$user->name}}</td>
   <td>{{$user->email}}</td>
   <td>
      none
   </td>
<td><img style="width: 100px;height: 100px" src="{{url('admin/users/'.$user->photo)}}"></td>
<td> <div class="btn-group" role="group"
  aria-label="Basic example">


        {{-- modaaal --}}

<button id="modal{{$user->name}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}" data-whatever="@getbootstrap">Edit modal</button>
{{-- start modal div --}}
<div class="moda modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
  
    <button id="close{{$user->name}}" type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  
  </div>
  <div class="modal-body">
   
    {{-- modal form  --}}
    <form id="formedit{{$user->name}}" class="formedit" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
        <label for="recipient-name" class="col-form-label">name</label>
        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="recipient-name">
        
        <label for="recipient-name" class="col-form-label">email</label>
        <input type="text" name="email" value="{{$user->email}}" class="form-control" id="recipient-name">
        
        <label for="recipient-name" class="col-form-label">password</label>
        <input type="text" placeholder="password" class="form-control" id="recipient-name">
        
        <label for="recipient-name" class="col-form-label">photo</label>
        <input type="file" name="photo" class="form-control" id="recipient-name">
        
        <label for="recipient-name" class="col-form-label">mobile</label>
        @foreach($user->mobile as $mobile)
        <div class="col">
        <input type="text" name="mobile" value="{{$mobile->mobile}}" class="form-control" id="recipient-name">
        <input type="hidden" name="user_id" value="{{$mobile->user_id}}">  
      </div>
        @endforeach
        
        <input type="hidden" value="{{$user->id}}" name="user_id" id="user_id{{$user->id}}">
        <button type="button" id="edit{{$user->name}}" class="edit_modal btn btn-primary">Edit User</button>
      </div> 
    </form>
  </div>
  
  <div class="modal-footer">
    <button class="close_modal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

   {{--  end modaaal --}}
   <a id="btn_delete" href="" user_id={{$user->id}}
  class="btn_delete btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
</div></td>
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

@endsection