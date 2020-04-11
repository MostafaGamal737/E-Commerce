$(document).ready(function(){
  $('.like').each(function(){
    $(this).click(function(event){
       var product_id=$(this).find('#product_id').val();
       var user_id=$(this).find('#user_id').val();
      var color=$(this).css('color')
       if (color=='rgb(255, 0, 0)') {
         $(this).css('color','black');
         console.log(color);
       }else {
         $(this).css('color','red');
         console.log(color);
       }


       $.post('../like',{'like':1,'product_id':product_id,'user_id':user_id,'_token':$('input[name=_token]').val()},function(data){

        });
    });
  });
});
