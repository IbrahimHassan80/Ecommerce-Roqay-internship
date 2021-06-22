@extends('user.dash.index')
@section('content')

<div class="row">
<div class="col-md-5"><img width="300" height="275" src="{{url('admin/products/' . $product->photo)}}" alt=""></div>
<div class="col-md-5">
    <h2>{{$product->name}}</h2>
    <h3>price: {{$product->price}}</h3>
    <h5>{{$product->description}}</h5>
    <form id="addtocard" action="{{route('user.addto.cart')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$product->id}}" name="product_id">
        {{-- <button id="btn_click" class="btn btn-primary">{{$product->users->count() > 0 ? 'remove from Cart' : 'Add To Cart'}}</button> --}}
        <input id="btn_click" type="submit" class="btn btn-primary" value="{{$product->users->count() > 0 ? 'remove from Cart' : 'Add To Cart'}}">
    </form>
</div>

</div>

@endsection

@section('script')
<script>
    //   Store Ajax User
      $(document).on('click', '#btn_click', function (e) {
        e.preventDefault();
          
          var formData = new FormData($('#addtocard')[0]);
          $.ajax({
              type: 'post',
              url: "{{route('user.addto.cart')}}",
              data: formData,
              processData: false,
              contentType: false,
              cache: false,
              success: function (data) {
                
              }, error: function (reject) {
                
              }
          });
      });
      </script>
@endsection