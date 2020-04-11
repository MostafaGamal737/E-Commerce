@extends('admin\master\dashboard')
@section('body')
  <div class="container" >
    <div class="row">
        <div class="col-md-1">
          <a href="AddBlogs" class="btn btn-primary">add Blog</a>
        </div>


    </div>
  </div>
  <table class="table table-striped" id="con">
     <thead>
       <tr>
         <th>id</th>
         <th>Title</th>
         <th>action</th>
       </tr>
     </thead>
     <tbody >

       @foreach ($blogs as $blog)
       <tr >
         <td>{{$blog->id}}</td>
         <td>{{$blog->title}}</td>
<td><a href="{{asset('blog')}}/{{$blog->id}}" class="btn btn-primary">show</a><a href="{{asset('DeleteBlog')}}/{{$blog->id}}" class="btn btn-danger">Delete</a></td>
       </tr>
       @endforeach
     </tbody>
   </table>
   {{csrf_field()}}



@endsection
