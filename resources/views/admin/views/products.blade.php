@extends('admin\master\dashboard')
@section('body')
<a href="AddProduct" class="btn btn-primary">add product</a>
  <table class="table table-striped">
     <thead>
       <tr>
         <th>id</th>
         <th>name</th>
         <th>price</th>
         <th>discount</th>
         <th>category</th>
         <th>department</th>
         <th >action</th>
       </tr>
     </thead>
     <tbody>

       @foreach ($products as $product)
       <tr>
         <td>{{$product->id}}</td>
         <td>{{$product->name}}</td>
         <td>{{$product->price}}</td>
         <td>{{$product->discount}}</td>
         <td>{{$product->category->name}}</td>
         <td>{{$product->department->name}}</td>
         <td><a href="{{asset('Shop')}}/{{$product->id}}" class="btn btn-primary">show</a><a href="products\{{$product->id}}" class="btn btn-info">ubdate</a><a href="DeleteProduct/{{$product->id}}" class="btn btn-danger">Delete</a></td>

       </tr>
       @endforeach
     </tbody>
   </table>

@endsection
