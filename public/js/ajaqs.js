
$(document).ready(function(){
  $('#Add').click(function(){

      var text=$('#name').val();
      $.post('Adddepartment',{'name':text,'_token':$('input[name=_token]').val()},function(data){
     $('#con').load(location.href +' #con');
      });
      $('#name').val('');

  });


  $('.Deletedepartment').each(function(){
    $(this).click(function(event){
      var department=$(this).find('#department_id').val();
      $.post('Deletedepartment',{'id':department,'_token':$('input[name=_token]').val()},function(data){
        $('#con').load(location.href +' #con');
      });
    });
  });

  $('.DeleteCategory').each(function(){
    $(this).click(function(event){
      var category=$(this).find('#category_id').val();
      $.post('DeleteCategory',{'id':category,'_token':$('input[name=_token]').val()},function(data){
        $('#con').load(location.href +' #con');
      });
    });
  });


  $('#Addcategory').click(function(){
    var text=$('#name').val();
    $.post('Addcategory',{'name':text,'_token':$('input[name=_token]').val()},function(data){
      $('#con').load(location.href +' #con');
    });
    $('#name').val('');

  });
});
