@extends('admin\master\dashboard')
@section('body')
  <div class="container" >
    <div class="row">
          <div class="col-md-2">
            <input type="text" class="form-control" value="" id="name">
        </div>
        <div class="col-md-1">
          <input type="button" class="btn btn-primary"value="add a departmen" id="Add">
        </div>


    </div>
  </div>
  <table class="table table-striped" id="con">
     <thead>
       <tr>
         <th>id</th>
         <th>name</th>
         <th>action</th>
       </tr>
     </thead>
     <tbody >

       @foreach ($departments as $department)
       <tr >
         <td>{{$department->id}}</td>
         <td>{{$department->name}}</td>
         <td><a href="#" class="btn btn-primary">show</a><a href="#"  id="" class="btn btn-danger Deletedepartment">Delete
         <input  type="hidden" id='department_id' value='{{$department->id}}'>
         </a></td>

       </tr>
       @endforeach
     </tbody>
   </table>
   {{csrf_field()}}



@endsection
@section('jsSection')
    <script src="{{asset('js/ajaqs.js')}}"/></script>
@endsection
