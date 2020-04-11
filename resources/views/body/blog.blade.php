@extends('master\master')
@section('class-blog')
  active
@endsection
@section('body')
  <!-- Breadcrumb Section Begin -->
   <div class="breacrumb-section">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="breadcrumb-text">
                       <a href="#"><i class="fa fa-home"></i> Home</a>
                       <span>Blog</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Breadcrumb Section Begin -->

   <!-- Blog Section Begin -->
   <section class="blog-section spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                   <div class="blog-sidebar">
                       <div class="search-form">
                           <h4>Search</h4>
                           <form action="#">
                               <input type="text" placeholder="Search . . .  ">
                               <button type="submit"><i class="fa fa-search"></i></button>
                           </form>
                       </div>
                       <div class="blog-catagory">
                           <h4>Categories</h4>
                           <ul>
                               <li><a href="#">Fashion</a></li>
                               <li><a href="#">Travel</a></li>
                               <li><a href="#">Picnic</a></li>
                               <li><a href="#">Model</a></li>
                           </ul>
                       </div>
                       <div class="recent-post">
                           <h4>Recent Post</h4>
                           @foreach ($posts as  $post)

                           <div class="recent-blog">
                               <a href="{{asset('blog')}}/{{$post->id}}" class="rb-item">
                                   <div class="rb-pic">
                                       <img src="{{asset('postimages')}}\{{$post->image}}" alt="">
                                   </div>
                                   <div class="rb-text">
                                       <h6>{{$post->title}}</h6>
                                       <p>{{$post->about}} <span>{{$post->created_at->diffForHumans()}}</span></p>
                                   </div>
                               </a>

                           </div>
                         @endforeach
                       </div>

                   </div>
               </div>
               <div class="col-lg-9 order-1 order-lg-2">
                   <div class="row">
                     @foreach ($posts as $post)

                       <div class="col-lg-6 col-sm-6">
                           <div class="blog-item">
                               <div class="bi-pic">
                                   <img src="{{asset('postimages')}}/{{$post->image}}" alt="">
                               </div>
                               <div class="bi-text">
                                   <a href="{{asset('blog')}}/{{$post->id}}">
                                       <h4>{{$post->title}}</h4>
                                   </a>
                                   <p>{{$post->about}} <span>{{$post->created_at->diffForHumans()}}</span></p>
                               </div>
                           </div>
                       </div>
                     @endforeach
                     </div>


                       <div class="col-lg-12">
                           <div class="loading-more">
                               <i class="icon_loading"></i>
                               <a href="#">
                                   Loading More
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Blog Section End -->

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

@endsection
