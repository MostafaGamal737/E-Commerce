@extends('master\master')
@section('class-shop')
  active
@endsection
@section('body')
  @php
  use  App\product;
  use  App\category;
  use  App\department;
  @endphp
  <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>advancedsearch</span>

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
                        <ul class="filter-catagories ">
                          @foreach (category::all() as $category)

                            <li

                              class="list-group-item "

                            >
                            <a href="{{asset('categories')}}/{{$category->name}}">{{$category->name}}</a></li>

                          @endforeach

                        </ul>
                    </div>



                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                            advancedsearch
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">

                            </div>
                        </div>
                    </div>

                    <div class="product-list">
                        <div class="row">
                          <form class="" action="{{asset('advancedsearch/result')}}" method="post">
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
                            <div class="form-group">
                              <label class="control-label col-sm-2" >department</label>
                              <div class="col-sm-10">

                                <select class="" name="department">
                                  @foreach (department::all() as $department)
                                    <option value="{{$department->id}}" >
                                      {{$department->name}}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" >category</label>
                              <div class="col-sm-10">

                                <select class="" name="category">
                                  @foreach (category::all() as $category)
                                    <option value="{{$category->id}}">
                                      {{$category->name}}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <input type="submit"  class="filter-btn"value="Search" >
                          </div>

                        </form>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

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
