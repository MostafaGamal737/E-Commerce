$(document).ready(function(){
  $('#deal').click(function(){
     if ($(this).prop('checked')) {
       console.log('d');
       $('#show').show();
     }else {
       $('#show').hide();
     }


  });
});
