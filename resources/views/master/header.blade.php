<!DOCTYPE html>
@php
  use App\department;
  use App\category;
  use App\cart;
  use App\product;
  use App\like;
  use App\information;

if (Auth::check()) {
   $carts=cart::where('user_id',Auth::id())->get();
   $likes=like::where('user_id',Auth::id())->get();
}
  $information= information::first();

@endphp

<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    @yield('cs')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                      @if ($information)
                        {{$information->email}}
                      @endif

                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        @if ($information)

                          {{$information->phone}}
                        @endif
                    </div>
                </div>
                <div class="ht-right">
                  @if (Auth::check())
                    <a href="{{asset('Logout')}}" class="login-panel "><i class="fa fa-user"></i>{{ __('lang.logout')}}</a>
                    @else
                      <a href="{{asset('Login')}}" class="login-panel "><i class="fa fa-user"></i>{{ __('lang.login')}}</a>
                  @endif
                    <div class="lan-selector">
                      @if (session('lang')=='en')

                        <select class="language_drop " name="countries" id="countries" style="width:300px;"
                        onchange="location = this.options[this.selectedIndex].value;"
                        >
                              <option value='lang/en' data-image="{{asset('img/flag-1.jpg')}}" data-imagecss="flag yt"
                                data-title="English">English
                              </option>

                            <option class="selected" value='lang/eg' data-image="{{asset('img/Egypt-Flag.jpg')}}" data-imagecss="flag yu"
                                data-title="Bangladesh">arabic </option>
                        </select>
                        @else
                          <select class="language_drop " name="countries" id="countries" style="width:300px;"
                          onchange="location = this.options[this.selectedIndex].value;"
                          >
                          <option class="selected" value='lang/eg' data-image="{{asset('img/Egypt-Flag.jpg')}}" data-imagecss="flag yu"
                          data-title="Bangladesh">العربه </option>
                                <option value='lang/en' data-image="{{asset('img/flag-1.jpg')}}" data-imagecss="flag yt"
                                  data-title="English">الانجليزيه
                                </option>

                          </select>
                      @endif
                    </div>
                    <div class="top-social">
                        <a  href="https://www.facebook.com/"target="_blank"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="https://twitter.com/explore"  target="_blank"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{asset('Home')}}">
                                <img src="{{asset('img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                         <form class="form" action="{{asset('Search')}}" method="post">
                           {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" placeholder="{{ __('lang.what')}}"name='search'  id="search">
                                <button type="submit">
                                    <i class="ti-search">
                                    </i>
                              </button>
                            </div>
                          </form>
                        </div>
                    </div>
                      @if (Auth::check())
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="{{asset('mylikes')}}">
                                    <i class="icon_heart_alt"></i>
                                    <span>{{count($likes)}}</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{count($carts)}}</span>
                                </a>


                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                             @php
                                               $total=0
                                             @endphp
                                              @foreach ($carts as $cart)

                                                <tr>
                                                    <td class="si-pic"><img src="{{asset('images')}}/{{product::find($cart->product_id)->image}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{$cart->total_price}}</p>
                                                             @php
                                                               $total+=$cart->total_price
                                                             @endphp
                                                            <h6>{{product::find($cart->product_id)->name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                      <i id='' class="ti-close DeleteCart">
                                                       <input type="hidden" id="Cartproduct_id" value="{{$cart->id}}">
                                                      </i>
                                                    </td>
                                                </tr>
                                              @endforeach
                                           {{csrf_field()}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>${{$total}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{asset('showCart')}}" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="payment" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{$total}}</li>
                        </ul>
                    </div>
                  @endif
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>departments</span>
                        <ul class="depart-hover">
                          @foreach ( department::all() as $department)
                            <li ><a href="{{asset('departments')}}/{{$department->name}}">{{$department->name}}</a></li>

                          @endforeach

                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="@yield('class-home')"><a href="{{asset('Home')}}">{{ __('lang.home')}}</a></li>
                        <li class="@yield('class-shop')"><a href="{{asset('Shop')}}">{{ __('lang.shop')}}</a></li>
                        <li class="@yield('clas')"><a href="{{asset('Home')}}">{{ __('lang.collection')}}</a>
                            <ul class="dropdown">
                              @foreach ( category::all() as $category)
                                <li ><a href="{{asset('categories')}}/{{$category->name}}">{{$category->name}}</a></li>

                              @endforeach
                            </ul>
                        </li>
                        <li class="@yield('class-blog')"><a href="{{asset('Blog')}}">{{ __('lang.blog')}}</a></li>
                        <li class="@yield('class-contact')"><a href="{{asset('Contact-US')}}">{{ __('lang.contact')}}</a></li>
                        <li><a href="advancedsearch">{{ __('lang.advancedsearch')}}</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
