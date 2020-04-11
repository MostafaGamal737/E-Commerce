@extends('master\master')
@section('class-shop')
  active
@endsection
@section('body')
  @php
  use  App\product;
  use  App\category;
  @endphp
  <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                          @foreach ($categories as $category)
                            <li><a href="#">{{$category->name}}</a></li>

                          @endforeach

                        </ul>
                    </div>
<form class="" action="searchprice" method="post">
@csrf
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" name="min" id="minamount">
                                    <input type="text" name="max" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="100" data-max="10000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <input type="submit"  class="filter-btn"value="Filter" >
                    </div>
                  </form>


                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show {{count($products)}} Of {{count($allproducts)}} Product</p>
                            </div>
                        </div>
                    </div>

                    <div class="product-list">
                        <div class="row">
                          @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="{{asset('images')}}/{{$product->image}}" alt="">
                                         @if ($product->discount>0)
                                           <div class="sale pp-sale">Sale</div>

                                         @endif
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
                                            <li class="quick-view"><a href="Shop/{{$product->id}}">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"></div>
                                        <a href="Shop/{{$product->id}}">
                                            <h5>{{$product->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                          @if (($product->discount)>0)
                                            {{($product->price)-($product->discount)}}
                                            <span>{{$product->price}}</span>
                                            @else
                                            {{($product->price)-($product->discount)}}
                                          @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
@include('body.Addquantity')
                              {{$products->links()}}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

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
  <script src="{{asset('js/quantity.js')}}"/></script>
  <script src="{{asset('js/like.js')}}"/></script>
@endsection
