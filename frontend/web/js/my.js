let id;
$('.filtr').on('click', function(){
     id = $(this).data('id');
    
})

$('#btn-info').on('click', function(){
  let data = $('#data-info').val();
  if(id >0 && data != ''){
  $.ajax({
      url: '/site/ajax',
      data:{id: id, data: data},
      type: 'GET',
      //dataType: 'json',
      beforeSend: function(){
        $('.info').html('Loading...');
      },
      success: function(res){
          $('.info').html(res);
      },
      error: function(){
          console.log('Error');
      }
  })
 }
})
