@extends('master\master')
@section('class-home')
  active
@endsection
@section('body')
  <!-- Hero Section Begin -->
  @php
  use App\comment;
  @endphp
   <section class="hero-section">


       <div class="hero-items owl-carousel">
         @foreach ($products as $product)
           <div class="single-hero-items set-bg" data-setbg="{{asset('images')}}/{{$product->image}}">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-5">
                           <span>Bag,kids</span>
                           <h1>Black friday</h1>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                               incididunt ut labore et dolore</p>
                           <a href="{{asset('Shop')}}/{{$product->id}}" class="primary-btn">Shop Now</a>
                       </div>
                   </div>
                   <div class="off-card">
                       <h2>Sale <span>50%</span></h2>
                   </div>
               </div>
           </div>
         @endforeach
       </div>

   </section>
   <!-- Hero Section End -->

   <!-- Banner Section Begin -->
   <div class="banner-section spad">
       <div class="container-fluid">
           <div class="row">
             @foreach ($departments as $department)

               <div class="col-lg-4">
                   <div class="single-banner">
                       <img src="img/banner-1.jpg" alt="">
                       <div class="inner-text">
                           <a href="departments/{{$department->name}}"> <h4>{{$department->name}}</h4></a>
                       </div>
                   </div>
               </div>
             @endforeach


           </div>
       </div>
   </div>
   <!-- Banner Section End -->

   <!-- Women Banner Section Begin -->
   <section class="women-banner spad">
       <div class="container-fluid">
           <div class="row">
               <div class="col-lg-3">
                   <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                       <h2>Women’s</h2>
                       <a href="#">Discover More</a>
                   </div>
               </div>
               <div class="col-lg-8 offset-lg-1">
                   <div class="filter-control">
                       <ul  >
                         @foreach ($categories as $category)

                           <li id="{{$category->name}}" class="cat {{$category->id}}" >{{$category->name}}
                           <input type="hidden" id="category" value="{{$category->name}}">
                           <input type="hidden" id="category_id" value="{{$category->id}}">
                           </li>
                         @endforeach

                       </ul>
                   </div>
                   <div class="product-slider owl-carousel">
                     @php
                     $counter=0;
                     @endphp
                     @foreach ($products as $product)

                       <div class="product-item">
                           <div class="pi-pic">
                               <img id="image" src="{{asset('images')}}/{{$product->image}}" alt="">
                               <div class="sale">Sale</div>
                              @if (Auth::check())



                               <div class="icon ">
                                   <i class="fa fa-heart  like"
                                   @foreach ($likes as $like)
                                    @if ($like->product_id==$product->id&&$like->user_id==Auth::id())
                                    style="color:red"

                                    @endif
                                  @endforeach
                                     >
                                    <input type="hidden" id="product_id" value='{{$product->id}}'>
                                    <input type="hidden" id="user_id" value='{{Auth::id()}}'>
                                   </i>
                               </div>
                         @endif
                               <ul>
                                   <li class="w-icon active qunt" ><a  data-toggle="modal" data-target="#exampleModal" href="#">
                                     <i  class="icon_bag_alt"></i></a>
                                    <input type="hidden" id="product_id" value="{{$product->id}}">
                                   </li>
                                   <li class="quick-view"><a href="{{asset('Shop')}}/{{$product->id}}">+ Quick View</a></li>
                                   <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                               </ul>
                           </div>
                           <div class="pi-text">
                               <div class="catagory-name">{{$product->category_id}}</div>
                               <a href="{{asset('Shop')}}/{{$product->id}}">
                                   <h5 id="name{{$counter++}}">{{$product->name}}</h5>
                               </a>
                               <div class="product-price">
                                   {{$product->price}}
                                   <span>{{($product->price)-($product->discount)}}</span>
                               </div>
                           </div>
                       </div>
                     @endforeach

                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Women Banner Section End -->
@include('body.Addquantity')
@include('Errors')
   <!-- Deal Of The Week Section Begin-->
   <section class="deal-of-week set-bg spad" data-setbg="{{asset('images')}}/@if ($dealofweek){{$dealofweek->image}}@endif">
       <div class="container">
           <div class="col-lg-6 text-center">
               <div class="section-title">
                 <h2>Deal Of The Week</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                   consectetur adipisicing elit </p>
                   <div class="product-price">@if ($dealofweek)
                     {{$dealofweek->price}}
                     <span>{{$dealofweek->category->name}}</span>
                   @endif</div>
                 </div>
                 <div class="countdown-timer">
                   <div class="cd-item col-lg-10">
                     @if ($dealofweek)<span>{{($dealofweek->updated_at->addDays($dealofweek->dealtime))->format('d')-(carbon\carbon::now()->format('d'))}} </span>
                     @endif<p>Days Left</p>
                   </div>
                   @if ($dealofweek) <a href="{{asset('Shop')}}/{{$dealofweek->id}}" class="primary-btn">Shop Now</a>
                   @endif
           </div>
       </div>
   </section>
   <!-- Deal Of The Week Section End -->

   <!-- Latest Blog Section Begin -->
   <section class="latest-blog spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-title">
                       <h2>From The Blog</h2>
                   </div>
               </div>
           </div>
           <div class="row">
             @foreach ($blogs as $blog)

               <div class="col-lg-4 col-md-6">
                   <div class="single-latest-blog">
                       <img src="{{asset('postimages')}}/{{$blog->image}}" alt="">
                       <div class="latest-text">
                           <div class="tag-list">
                               <div class="tag-item">
                                   <i class="fa fa-calendar-o"></i>
                                   {{$blog->created_at->diffForHumans()}}
                               </div>
                               <div class="tag-item">
                                   <i class="fa fa-comment-o"></i>
                                   {{ count ($comments=comment::where('blog_id','=', $blog->id)->get())}}
                               </div>
                           </div>
                           <a href="{{asset('blog')}}/{{$blog->id}}">
                               <h4>{{$blog->title}}</h4>
                           </a>
                           <p>{{$blog->about}} </p>
                       </div>
                   </div>
               </div>
             @endforeach

           </div>
           <div class="benefit-items">
               <div class="row">
                   <div class="col-lg-4">
                       <div class="single-benefit">
                           <div class="sb-icon">
                               <img src="img/icon-1.png" alt="">
                           </div>
                           <div class="sb-text">
                               <h6>Free Shipping</h6>
                               <p>For all order over 99$</p>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-4">
                       <div class="single-benefit">
                           <div class="sb-icon">
                               <img src="img/icon-2.png" alt="">
                           </div>
                           <div class="sb-text">
                               <h6>Delivery On Time</h6>
                               <p>If good have prolems</p>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-4">
                       <div class="single-benefit">
                           <div class="sb-icon">
                               <img src="img/icon-1.png" alt="">
                           </div>
                           <div class="sb-text">
                               <h6>Secure Payment</h6>
                               <p>100% secure payment</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Latest Blog Section End -->

   <!-- Partner Logo Section Begin -->
   <div class="partner-logo">
       <div class="container">
           <div class="logo-carousel owl-carousel">
               <div class="logo-item">
                   <div class="tablecell-inner">
                       <img src="img/logo-carousel/logo-1.png" alt="">
                   </div>
               </div>
               <div class="logo-item">
                   <div class="tablecell-inner">
                       <img src="img/logo-carousel/logo-2.png" alt="">
                   </div>
               </div>
               <div class="logo-item">
                   <div class="tablecell-inner">
                       <img src="img/logo-carousel/logo-3.png" alt="">
                   </div>
               </div>
               <div class="logo-item">
                   <div class="tablecell-inner">
                       <img src="img/logo-carousel/logo-4.png" alt="">
                   </div>
               </div>
               <div class="logo-item">
                   <div class="tablecell-inner">
                       <img src="img/logo-carousel/logo-5.png" alt="">
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Partner Logo Section End -->


@endsection
@section('js')
    <script src="{{asset('js/slider.js')}}"/></script>
    <script src="{{asset('js/quantity.js')}}"/></script>
    <script src="{{asset('js/like.js')}}"/></script>

@endsection
