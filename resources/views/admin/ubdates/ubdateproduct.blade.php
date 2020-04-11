@extends('admin\master\dashboard')
@section('body')
    <form class="form-horizontal" action="{{asset('products')}}/{{$product->id}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label class="control-label col-sm-2" >product name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{$product->name}}" name="name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >matreal name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{$product->material}}" name="material">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  value="{{$product->price}}" name="price">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >discount</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  value="{{$product->discount}} " name="discount">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >amount</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  value="{{$product->amount}} " name="amount">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >product Image</label>
        <div class="col-sm-10">
          <input type="file" value="{{$product->image}}"  name="image">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >department</label>
        <div class="col-sm-10">

          <select class="" name="department">
            @foreach ($departments as $department)
              <option
              @if ($department->id==$product->department->id)
                selected
              @endif value="{{$department->id}}">
                {{$department->name}}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >categories</label>
        <div class="col-sm-10">

          <select class="" name="category" >

            @foreach ($categories as $category)
              <option
              @if ($category->id==$product->category->id)
                selected
              @endif  value="{{$category->id}}">
                {{$category->name}}
              </option>
            @endforeach

          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >deal of the week</label>
        <div class="col-sm-1">
          <input type="checkbox"id='deal' name="deal" style="margin-top:15px;">
        </div>
        <div id="show" style="display:none">
          <label class="control-label col-sm-2"  >for how long</label>
          <div class="col-sm-2">
            <input type="datetime"name="dealtime" class="form-control" placeholder="the duration"  style="margin-top:5px;" >
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
