@extends('master\master')
@section('class-shop')

@endsection
@section('body')
  @php
    use App\department;
    use App\cart;
    use App\like;
    use App\product;


  @endphp
<!-- Breadcrumb Section Begin -->
   <div class="breacrumb-section">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="breadcrumb-text product-more">
                       <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                       <a href="./shop.html">Shop</a>
                       <span>Shopping Cart</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Breadcrumb Section Begin -->

   <!-- Shopping Cart Section Begin -->
   <section class="shopping-cart spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="cart-table">
                       <table>
                           <thead>
                               <tr>
                                   <th>Image</th>
                                   <th class="p-name">Product Name</th>
                                   <th>Price</th>
                                   <th>category</th>
                                   <th>product</th>
                                   <th><i class="ti-close"></i></th>
                               </tr>
                           </thead>
                           <tbody>
                             @php
                               $total=0;
                             @endphp
                             @foreach ($likes as $key => $like)

                               <tr>
                                   <td class="cart-pic first-row"><img src="{{asset('images')}}/{{product::find($like->product_id)->image}}" alt=""></td>
                                   <td class="cart-title first-row">
                                       <h5>{{product::find($like->product_id)->name}}</h5>
                                   </td>
                                   <td class="p-price first-row">{{product::find($like->product_id)->price}}</td>
                                   <td class="qua-col first-row">
                                       <div class="quantity">
                                           <div class="cart-title first-row" >
                                               <h5 >{{product::find($like->product_id)->category->name}}</h5>
                                           </div>
                                       </div>
                                   </td>
                                   <td class="total-price first-row">
                                     <a href="{{asset('Shop')}}/{{$like->product_id}}" class="btn btn-primary">
                                       show
                                     </a>
                                   </td>
                                   <td class="close-td first-row"><i class="ti-close"></i></td>
                               </tr>
                               @php

                               @endphp
                             @endforeach

                           </tbody>
                       </table>
                   </div>
                   <div class="row">


                       </div>
                       <div class="col-lg-4 offset-lg-4">
                           <div class="proceed-checkout">
                               <ul>

                                   <li class="cart-total">Total <span>${{$total}}</span></li>
                               </ul>
                               <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Shopping Cart Section End -->

@endsection
