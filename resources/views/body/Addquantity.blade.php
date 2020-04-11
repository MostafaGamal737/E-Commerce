<div class="modal"id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add To Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="add" action="{{asset('AddToCart')}}" onSubmit="return formValidation();" method="post">
       {{csrf_field()}}

      <div class="modal-body">
        <h4>quantity you want </h4>
      <input type="text"id="ubdate_title" placeholder="quantity you want here" name="quantity" value="">
      <input type="hidden"id="product" name="product_id"  value="">
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_ubdats">Add </button>
      </div>
      </form>
    </div>
  </div>
</div>
