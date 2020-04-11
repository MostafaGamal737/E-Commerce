<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN DASHBOARD</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{asset('dash-board/css/bootstrap.css')}}"/ rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('dash-board/css/font-awesome.css')}}"/ rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('dash-board/css/custom.css')}}"/ rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>



    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('dash-board/img/logo.png')}}"/ />

                    </a>

                </div>

                <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">



                    <li >
                        <a href="{{asset('dashboard')}}" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>


                    <li>
                        <a href="{{asset('GetUsers')}}"><i class="fa fa-table "></i>users  </a>
                    </li>
                    <li>
                        <a href="{{asset('Debartments')}}"><i class="fa fa-edit "></i>Debartments </a>
                    </li>


                    <li>
                        <a href="{{asset('categories')}}"><i class="fa fa-qrcode "></i>categories</a>
                    </li>
                    <li>
                        <a href="{{asset('products')}}"><i class="fa fa-bar-chart-o"></i>products</a>
                    </li>

                    <li>
                        <a href="{{asset('Blogs')}}"><i class="fa fa-edit "></i>Blogs </a>
                    </li>
                    <li>
                        <a href="{{asset('About')}}-Us"><i class="fa fa-table "></i>about-Us</a>
                    </li>
                     <li>
                        <a href="{{asset('orders')}}"><i class="fa fa-edit "></i>orders </a>
                        <a href="{{asset('messages')}}"><i class="fa fa-edit "></i>messages </a>
                    </li>

                </ul>
              </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->

                <div class="row">
                  <div class="col-lg-12 ">
                      <div >
                        @yield('body')
                        </div>
                      </div>

                  </div>
                </div>
              </div>

             <!-- /. PAGE INNER  -->
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">


            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>


     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('dash-board/js/jquery-1.10.2.js')}}"/></script>
      <!-- BOOTSTRAP SCRIPTS -->
      @yield('jsSection')
    <script src="{{asset('dash-board/js/bootstrap.min.js')}}"/></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('dash-board/js/custom.js')}}"/></script>
</body>
</html>
