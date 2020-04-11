@extends('master\master')

@section('body')
  <!-- Breadcrumb Section Begin -->
  <div class="breacrumb-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="breadcrumb-text">
                      <a href="#"><i class="fa fa-home"></i> Home</a>
                      <span>Login</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Breadcrumb Form Section Begin -->

  <!-- Register Section Begin -->
  <div class="register-login-section spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 offset-lg-3">
                  <div class="login-form">
                      <h2>Reset</h2>
                      @if (session('message'))
                        @include('messages')
                      @endif

                      <form action="{{asset('ResetPassword')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}

                          <div class="group-input">
                              <label for="pass">ENTER TOUY EMAIL*</label>
                              <input type="email" id="pass" name="email">
                          </div>

                          <button type="submit" class="site-btn login-btn">reset</button>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Register Form Section End -->
  @include('errors')

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
