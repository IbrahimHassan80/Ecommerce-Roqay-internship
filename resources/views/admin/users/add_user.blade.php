@extends('admin.layout.index')
@section('title','Add Users')
@section('content')

    <form class="" method="post" id="userSave" action="{{route('users.store')}}" class="col-md-6" enctype="multipart/form-data">
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
          
          <div class="field_wrapeer">
            <input type="text" id="mobile" name="mobile[]" class="form-control" placeholder="mobile">
            <a href="javascript:void(0);" class="add_button" title="Add field">add</a>
            <span id="mobile_error" class="text-danger"> </span>
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
       
        <div class="alert alert-success" id="success-msg" style="display: none">
            تم الحفظ بنجاح
        </div>
        <div class="alert alert-danger" id="deleted-msg" style="display: none">
            تم الحذف بنجاح
        </div>
    </form>
    {{-- ---------------------------------------------- --}}
    
    {{-- table list of user --}}
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
       @foreach($data as $user)
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
    @stop
    
    {{------------------------------- AJAAAAAAX -------------------------------- --}}
    @section('script')
    <script>
    
    //   Store Ajax User
      $(document).on('click', '#btn-click', function (e) {
          e.preventDefault();
          $("#name_error").text('');
          $("#email_error").text('');
          $("#mobile_error").text('');
          $("#password_error").text('');
          $("#photo_error").text('');
          
          var formData = new FormData($('#userSave')[0]);
          $.ajax({
              type: 'post',
              enctype: 'multipart/form-data',
              url: "{{route('users.store')}}",
              data: formData,
              processData: false,
              contentType: false,
              cache: false,
              success: function (data) {
                  if (data.status == true) {
                      $('#success-msg').show();
                      $("#username").val('');
                      $("#email").val('');
                      $("#password").val('');
                      $("#mobile").val('');
                      $("#file").val('');
                  }
              }, error: function (reject) {
                  var response = $.parseJSON(reject.responseText);
                  $.each(response.errors, function (key, val) {
                      $("#" + key + "_error").text(val[0]);
                  });
              }
          });
      });
   

      
     


    /////   Edit AJAX ----------------/////////////////////--------------------------//
      
    $(document).on('click', '.edit_modal', function (e) {
    e.preventDefault();
   // console.log(this.parentElement.parentElement);
    var formData = new FormData($(this.parentElement.parentElement)[0]);
    $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: "{{route('users.update')}}",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            if (data.status == true) {
                $('#success-msg').show();
                $(".close_modal").click();
            }
        }, error: function (reject) {
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
            });
        }
    });
});

  
//Delete AJax User ----------/////////////////////////--------------------------- //
   $(document).on('click', '.btn_delete', function (e) {
          e.preventDefault();
          
          var user_id = $(this).attr('user_id');
          $.ajax({
              type: 'post',
              url: "{{route('users.destroy')}}",
              data: {
                "_token" : "{{ csrf_token() }}",
                  'id'   : user_id
              }, 
              success: function (data) {
                  if (data.msg == 'deleted') {
                      $('#deleted-msg').show();
                      $('.user_id_' + data.id).remove();
                  }
              }, error: function (reject) {
                  var response = $.parseJSON(reject.responseText);
                  $.each(response.errors, function (key, val) {
                      $("#" + key + "_error").text(val[0]);
                  });
              }
          });
      });
  
 
      // Add multi number fields--------------///////////////////------------------- //
  $(document).ready(function(){
    var maxfield = 10;
    var addbutton = $('.add_button');
    var wrapper = $('.field_wrapeer');
    var fieldhtml = ' <div><input type="text" name="mobile[]" class="form-control" placeholder="mobile+"><a class="remove_button" href="javascript:void(0)">Remove</a></div>';
    var x = 1;

    $(addbutton).click(function(){
        //Check maximum number of input fields
        if(x < maxfield){ 
            x++; //Increment field counter
            $(wrapper).append(fieldhtml); //Add field html
        }
    });
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
  
  });
  </script>
   @stop
   