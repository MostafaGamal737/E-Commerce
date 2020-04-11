
@extends('admin\master\dashboard')
@section('body')
  @extends('admin\master\dashboard')
  @section('body')

    <form class="form-horizontal" action="AddBlogs" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" >post Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter Post Title " name="title">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >post about</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Enter Post about " name="about">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >post Body</label>
        <div class="col-sm-10">
          <textarea class="form-control"  placeholder="Enter post body " name="body"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >post Image</label>
        <div class="col-sm-10">
          <input type="file"   name="image">
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

@endsection
