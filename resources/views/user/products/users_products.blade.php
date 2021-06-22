@extends('user.dash.index')
@section('content')
<div class="row">
@foreach($product as $pro)
<div class="card col-md-3" style="width: 18rem;">
    <img src="{{url('admin/products/' . $pro->photo)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$pro->name}}</h5>
      <p class="card-text">{{$pro->description}}</p>

      <a href="{{route('show.product',$pro->id)}}" class="btn btn-primary">show Product</a>
    </div>
  </div>
  
@endforeach
</div>
@stop