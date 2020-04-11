@extends('admin\master\dashboard')
@section('body')
  <div class="container" >

  </div>
  <table class="table table-striped" id="con">
     <thead>
       <tr>
         <th>name</th>
         <th>email</th>
         <th>message</th>
       </tr>
     </thead>
     <tbody>

       @foreach ($messages as $message)
       <tr>
         <td>{{$message->name}}</td>
         <td>{{$message->email}}</td>
         <td>{{$message->message}}</td>


       </tr>
       @endforeach
     </tbody>
   </table>


@endsection
