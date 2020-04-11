$(document).ready(function(){
  $('.qunt').each(function(){
    $(this).click(function(){
      var product_id= $(this).find('#product_id').val();
      $('#product').val(product_id);
      console.log($('#product').val());
    });
  });
});
