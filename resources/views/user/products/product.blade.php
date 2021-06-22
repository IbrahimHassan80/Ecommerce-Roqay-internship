@extends('user.dash.index')
@section('content')
    
<div class="row">
@foreach($category as $cat)
 <div class="card col-md-3" style="width: 18rem;">
    <img src="{{url('admin/products/' . $cat->photo)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$cat->name}}</h5>
      <p class="card-text">{{$cat->description}}</p>

      <a href="{{route('show.product',$cat->id)}}" class="btn btn-primary">show Product</a>
    </div>
  </div>
  @endforeach
</div>
@endsection