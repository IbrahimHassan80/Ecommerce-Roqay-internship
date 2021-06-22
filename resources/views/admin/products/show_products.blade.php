@extends('admin.layout.index')
@section('content')
@section('title','show products')

<div class="app-content content">
 <div class="content-wrap3per">
       
   <div class="content-body">
            <!-- DOM - jQuery events table -->
  <section id="dom">
    <div class="row">
       <div class="col-12">
        <div class="card">
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
               <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                 <thead>
                    <tr>

                      <th>name</th>
                      <th>price</th>
                      <th>description</th>
                      <th>صورة المنتج</th>
                      <th>الإجراءات</th>
                      </tr>
                      </thead>
                    <tbody>
                      @foreach($product as $products)      
                      <tr>
                       <td>{{$products->name}}</td>
                       <td>{{$products->price}}</td>
                       <td>{{$products->description}}</td>
                       <td><img style="width: 100px;height: 100px" src="{{url('admin/products/'.$products->photo)}}"></td>
                       <td> <div class="btn-group" role="group" aria-label="Basic example">
                         <a href="" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                           @role('admin')
                           <form action="{{route('product.destroy', $products->id)}}" method="POST">
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

@endsection