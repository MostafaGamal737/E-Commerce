@extends('admin\master\dashboard')
@section('body')
@php
   use App\cart;
   use App\user;
@endphp
<table class="table table-striped" id="con">
   <thead>
     <tr>
       <th>id</th>
       <th>customer</th>
       <th>total price</th>
       <th>Time</th>
       <th>products_id</th>
     </tr>
   </thead>
   <tbody >
@foreach ($orders as $order)

     <tr >
       <td>{{$order->id}}</td>
       <td>{{user::find($order->user_id)->name}}</td>
       <td>{{$order->total_price}}</td>
       <td>{{$order->created_at->diffForHumans()}}</td>
       <td>@php

   $products_id= explode(' ', $order->payments);
       @endphp
       @foreach ($products_id as $product)
         {{$product}}
       @endforeach

     </td>

     </tr>
   @endforeach
   </tbody>
 </table>
@endsection
