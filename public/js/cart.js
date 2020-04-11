$(document).ready(function(){
  $('.DeleteCart').each(function(){
    $(this).click(function(event){
       var product_id=$(this).find('#Cartproduct_id').val();

       $.post('DeleteFromCart',{'Cartproduct_id':product_id,'_token':$('input[name=_token]').val()},function(data){
             location.reload();
       });
    });
  });
});
