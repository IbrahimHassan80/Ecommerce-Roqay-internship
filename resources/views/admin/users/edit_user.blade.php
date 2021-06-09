@extends('admin.layout.index')
@section('content')

<form method="post" id="useredit" action="{{route('users.store')}}" class="col-md-6" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col">
        <input name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="name">
        @error('name')
        <span class="text-danger">{{$message}} </span>
       @enderror
      </div>
      <div class="col">
        <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="email">
        <input type="hidden" value="{{$user->id}}" name="user_id">
        @error('email')
        <span class="text-danger">{{$message}} </span>
       @enderror
      </div>
      
      <div class="col">
        <input type="password" name="password" class="form-control" placeholder="password">
        @error('password')
        <span class="text-danger">{{$message}} </span>
        @enderror
      </div>
      
      <div class="col">
        <input type="text" value="{{$user->mobile}}" name="mobile" class="form-control" placeholder="mobile">
        @error('mobile')
        <span class="text-danger">{{$message}} </span>
       @enderror
      </div>

    </div>
    
    <div class="form-group">
        <label style="font-weight:bold;" for="exampleFormControlFile2">photo</label>
        <input name="photo" type="file" class="form-control" id="exampleFormControlFile2">
        @error('photo')
        <span class="text-danger">{{$message}} </span>
       @enderror
      </div>
    <button id="btn-click" class="btn btn-primary">edit user</button>
    
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
@section('script')
<script>
//   create ajax user
$(document).on('click', '#btn-click', function (e) {
    e.preventDefault();
    
    var formData = new FormData($('#useredit')[0]);
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
            }
        }, error: function (reject) {
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]);
            });
        }
    });
});
</script>
@stop