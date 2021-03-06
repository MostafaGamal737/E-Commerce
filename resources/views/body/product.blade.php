@extends('master\master')
@section('class-blog-detail')
  active
@endsection
@section('body')
  <!-- Blog Details Section Begin -->
  @php
  use App\user;

  @endphp
   <section class="blog-details spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="blog-details-inner">
                       <div class="blog-detail-title">
                           <h2>{{$product->name}}</h2>
                           <p>travel <span>- May 19, 2019</span></p>
                       </div>
                       <div class="blog-large-pic">
                           <img src="{{asset('images')}}\{{$product->image}}"$ alt="">
                       </div>
                       <div class="blog-detail-desc">
                           <p>
                             {{$product->price}}
                           </p>
                       </div>
                       @include('body/Addquantity')
                       <div class="tag-share">
                           <div class="details-tag ">
                               <ul>
                                   <li><i class="fa fa-tags"></i></li>
                                   <li class="like">   <i class="fa fa-heart  like"
                                      @foreach ($likes as $like)
                                       @if ($like->product_id==$product->id&&$like->user_id==Auth::id())
                                       style="color:red"

                                       @endif
                                     @endforeach
                                        >
                                      </i>
                                      <input type="hidden" id="product_id" value='{{$product->id}}'>
                                      <input type="hidden" id="user_id" value='{{Auth::id()}}'>
                                   </li>
                                   <li class="qunt"> <a  data-toggle="modal" data-target="#exampleModal" href="#">
                                     addtocart</a>
                                     <input type="hidden" id="product_id" value="{{$product->id}}">
                                   </li>

                               </ul>
                           </div>
                           <div class="blog-share">
                               <span>Share:</span>
                               <div class="social-links">
                                   <a href="#"><i class="fa fa-facebook"></i></a>
                                   <a href="#"><i class="fa fa-twitter"></i></a>
                                   <a href="#"><i class="fa fa-google-plus"></i></a>
                                   <a href="#"><i class="fa fa-instagram"></i></a>
                                   <a href="#"><i class="fa fa-youtube-play"></i></a>
                               </div>
                           </div>
                       </div>
                       <div class="blog-post">
                           <div class="row">
                               <div class="col-lg-5 col-md-6">

                                 @if ($Previousproduct!=null)
                                   <a href="{{asset('Shop')}}/{{$Previousproduct->id}}" class="prev-blog">
                                       <div class="pb-pic">
                                           <i class="ti-arrow-left"></i>
                                           <img src="{{asset('images')}}\{{$Previousproduct->image}}" alt="">
                                       </div>
                                       <div class="pb-text">
                                           <span>Previous Product:</span>
                                           <h5>{{$Previousproduct->name}}</h5>
                                       </div>
                                   </a>

                               @endif

                               </div>
                               <div class="col-lg-5 offset-lg-2 col-md-6">
                                 @if ($nextproduct!=null)

                                   <a href="{{asset('Shop')}}/{{$nextproduct->id}}" class="next-blog">
                                       <div class="nb-pic">
                                           <img src="{{asset('images')}}\{{$nextproduct->image}}" alt="">
                                           <i class="ti-arrow-right"></i>
                                       </div>
                                       <div class="nb-text">
                                           <span>Next Product:</span>
                                           <h5>{{$nextproduct->name}}</h5>
                                       </div>
                                   </a>
                                 @endif
                               </div>
                           </div>
                       </div> <h4>Comments</h4>
                       <div class="posted-by" style="overflow-y:auto;height:200px;">
                          @foreach ($comments as $comment)
                          @if ($comment->product_id==$product->id)
                            @php
                            $user=user::find($comment->user_id);
                            @endphp

                           <div class="pb-pic">
                               <img src="{{asset('img/blog/post-by.png')}}" alt="">
                           </div>
                           <div class="pb-text">
                               <a href="#">
                                   <h5>{{$user->name}}</h5>
                               </a>
                               <p>{{$comment->comment}}</p>
                               <hr>
                           </div>
                         @endif
                         @endforeach

                       </div>
                       <div class="leave-comment">
                           <h4>Leave A Comment</h4>
                           @if (Auth::check())

                           <form action="{{asset('addComment')}}" method="post" class="comment-form">
                          {{csrf_field()}}
                                   <div class="col-lg-12">
                                       <textarea name="comment" placeholder="Write A Comment"></textarea>
                                       <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                       <input type="hidden" name="product_id" value="{{$product->id}}">
                                       <input type="hidden" name="blog_id" value="0">
                                       <button type="submit" class="site-btn">Comment</button>
                                       @include('Errors')
                                   </div>
                               </div>
                           </form>
                         @else
                           <a href="{{asset('Login')}}" class="next-blog">Login</a>
                         @endif
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Blog Details Section End -->

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
