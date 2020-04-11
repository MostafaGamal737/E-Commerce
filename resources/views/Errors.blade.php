@foreach($errors->all() as $error)
  <h3 class="alert alert-danger">  error: {{$error}}</h3>
  <hr>
@endforeach
