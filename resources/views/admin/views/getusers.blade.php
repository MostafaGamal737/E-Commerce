@extends('admin\master\dashboard')
@section('body')

    <table class="table table-striped">
       <thead>
         <tr>
           <th>name</th>
           <th>email</th>
           <th>Role</th>
           <th style="float:right;">action</th>
         </tr>
       </thead>
       <tbody>

         @foreach ($users as $user)
         <tr class="table">
           <td>{{$user->name}}</td>
           <td>{{$user->email}}</td>
           <td>
             <select class="role" name="role" >

                 <option @if ($user->role=='user')
                   selected
                 @endif value="user {{$user->id}}">
                   User
                 </option >
                 <option  @if ($user->role=='admin')
                   selected
                 @endif  value="admin {{$user->id}}" >
                   Admin
                 </option>
                 <option  @if ($user->role=='superadmin')
                   selected
                 @endif  value="superadmin {{$user->id}}">
                   SuperAdmin
                 </option>

             </select>
           <td>
           <td style="float:left;"><a href="#" class="btn btn-primary">Show</a><a href="DeleteUser/{{$user->id}}" class="btn btn-danger">Delete</a></td>
@csrf
            </tr>
         @endforeach




       </tbody>
     </table>
@endsection
@section('jsSection')
  <script type="text/javascript">

  $(document).ready(function(){
    $('.role').each(function(){
      $(this).change(function(event){
        var role=$(this).val();
        $.post('user/Ubdate',{'role':role,'_token':$('input[name=_token]').val()},function(data){
          console.log(data);
          });
    });
    });
    });
    </script>
@endsection
