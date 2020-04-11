@extends('admin\master\dashboard')
@section('body')


    <form class="form-horizontal" action="AddProduct" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" >product name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter product name " name="name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >product material</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter product name " name="material">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter product price " name="price">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >discount</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter product discount " name="discount">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >Amount</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter product amount " name="amount">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >product Image</label>
        <div class="col-sm-10">
          <input type="file"   name="image">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >department</label>
        <div class="col-sm-10">

          <select class="" name="department">
            @foreach ($departments as $department)
              <option >
                {{$department->name}}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >categories</label>
        <div class="col-sm-10">

          <select class="" name="category">
            @foreach ($categories as $category)
              <option >
                {{$category->name}}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >deal of the week</label>
        <div class="col-sm-1">
          <input type="checkbox"id='deal'  style="margin-top:15px;">
        </div>
        <div id="show" style="display:none">
          <label class="control-label col-sm-2"  >for how long</label>
          <div class="col-sm-2">
            <input type="datetime" class="form-control" placeholder="the duration"  style="margin-top:5px;" >
          </div>
        </div>

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
    <script src="{{asset('js/show.js')}}"/></script>
@endsection
