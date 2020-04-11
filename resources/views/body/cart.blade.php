@extends('master\master')
@section('class-shop')
  active
@endsection
@section('body')
  @php
    use App\department;
    use App\cart;
    use App\product;
  if (Auth::check()) {
     $carts=cart::where('user_id',Auth::id())->get();

  }


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
                       <table id='products'>
                           <thead>
                               <tr>
                                   <th>Image</th>
                                   <th class="p-name">Product Name</th>
                                   <th>Price</th>
                                   <th>Quantity</th>
                                   <th>Total</th>
                                   <th><i class="ti-close"></i></th>
                               </tr>
                           </thead>
                           <tbody >
                             @php
                               $total=0;
                             @endphp
                             @foreach ($carts as $key => $cart)

                               <tr >
                                   <td class="cart-pic first-row"><img src="{{asset('images')}}/{{product::find($cart->product_id)->image}}" alt=""></td>
                                   <td class="cart-title first-row">
                                       <h5>{{product::find($cart->product_id)->name}}</h5>
                                   </td>
                                   <td class="p-price first-row">{{product::find($cart->product_id)->price}}</td>
                                   <td class="qua-col first-row">
                                       <div class="quantity">
                                           <div class="cart-title first-row" >
                                               <h5 >{{$cart->quantity}}</h5>
                                           </div>
                                       </div>
                                   </td>
                                   <td class="total-price first-row">{{$cart->total_price}}</td>
                                   <td class="close-td first-row"><i id='' class="ti-close DeleteCart">
                                    <input type="hidden" id="Cartproduct_id" value="{{$cart->id}}">
                                   </i></td>
                               </tr>
                               @php
                                 $total+=$cart->total_price;
                               @endphp
                             @endforeach
{{csrf_field()}}
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
                               <form class="" action="{{asset('CheckOut')}}" method="post">
                                 {{csrf_field()}}

                                 <input type="hidden" name="carts" value="@foreach ($carts as $key => $cart) {{$cart->id}}@endforeach">
                                 <input type="hidden" name="total_price" value="{{$total}}">
                                 <button type="submit" class="proceed-btn"style="width:100%">PROCEED TO CHECK OUT</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Shopping Cart Section End -->

@endsection
