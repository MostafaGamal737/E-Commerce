@extends('admin\master\dashboard')
@section('body')

  <form class="form-horizontal" action="AddInfromation" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="map spad">
        <div class="container">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="Search " id="searchmap">
            <input type="hidden" class="form-control" id="lat"name="lat">
            <input type="hidden" class="form-control" id="lng"name="lng">
          </div>
          <div id="map-canvas" style="width: 100%; height: 400px;"></div>



    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Email Address </label>
      <div class="col-sm-10">
        <input type="email" class="form-control"  placeholder="Enter email " name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >company Address </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter address " name="address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Phone Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter product name " name="phone">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Post</button>
      </div>
    </div>
    @foreach($errors->all() as $error)
      error: {{$error}}
    @endforeach
  </form>


@endsection
@section('jsSection')

  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl-RN4GbmqozoIGLWH3IvVvCtlTuWvVnk&libraries=places"
    type="text/javascript"
    >
  </script>
<script type="text/javascript" src="{{asset('js/map.js')}}"/></script>
@endsection
