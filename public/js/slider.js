$(document).ready(function(){

  $('.cat').each(function(){
    $(this).click(function(event){
      var text=$(this).find('#category').val();
      var category_id=$(this).find('#category_id').val();
    var css= document.getElementById(text);
    for (var i = 0; i < $('.cat').length; i++) {
      if (css.className==$('.cat')[i].className)
       {
         if ($(this).hasClass('active'))
          {

          }
          else
          {
            css.className+=" active";

          }
       }
       else
        {
          $('.cat')[i].classList.remove('active');
        }
    }

    $.get('product/'+category_id,function(data){

      for (var i = 0; i < data.length; i++) {
          var name= document.getElementById('name'+i);

          $(name).text(data[i]['name']);
          console.log($(name).text());
        //$('#name '+(data[i]['category_id'])).text(data[i]['name']);
      }
    });





    });
  });









});
