@extends('master\master')

@section('body')

      <!-- Breadcrumb Section Begin -->
      <div class="breacrumb-section">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="breadcrumb-text">
                          <a href="#"><i class="fa fa-home"></i> Home</a>
                          <span>Register</span>
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
                      <div class="register-form">
                          <h2>Register</h2>
                          <form class="form-horizontal" action="Registeration" method="post">
                            {{csrf_field()}}
                              <div class="group-input">
                                  <label for="username">Username </label>
                                  <input type="text" id="username"name="user_name">
                              </div>
                              <div class="group-input">
                                  <label for="username"> email address </label>
                                  <input type="email" id="username"name="Email">
                              </div>
                              <div class="group-input">
                                  <label for="pass">Password </label>
                                  <input type="password" id="pass"name="password">
                              </div>
                              <div class="group-input">
                                  <label for="con-pass">Confirm Password </label>
                                  <input type="password" id="con-pass" name="password_confirmation" >
                              </div>
                              <button type="submit" class="site-btn register-btn">REGISTER</button>
                          </form>
                          <div class="switch-login">
                              <a href="{{asset('Login')}}" class="or-login">Or Login</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

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
