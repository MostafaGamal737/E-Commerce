<table class="table table-striped" id="con">
   <thead>
     <tr>
       <th>id</th>
       <th>customer</th>
       <th>total price</th>
       <th>Time</th>
       <th>showindetal</th>
     </tr>
   </thead>
   <tbody >

     <tr >
       <td>a</td>
       <td>{{$user->email}}</td>
       <td>{{$total}}</td>
       <td>s</td>
       <td>@foreach ($carts as $cart)
{{$cart->id}}
       @endforeach</td>

     </tr>
   </tbody>
 </table>
