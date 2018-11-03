;(function($){

   $(document).ready( function(){

   	   $('#reservationnow').on('click', function(){


   	   		$.post(mealpurl.ajaxurl,{
              
              action:'reservation',
              name:$('#name').val(),
              email:$('#email').val(),
              phone:$('#phone').val(),
              persons:$('#persons').val(),
              date:$('#date').val(),
              time:$('#time').val(),
              rn:$('#rn').val(),
          },function(data){
            console.log(data);
              if('Duplicate' == data){
                 alert("Your reservation is already submitted so no need again to submit.");
              } else{
                 $('#paynow').attr('href',data);
                 $('#reservationnow').hide();
                 $('#paynow').show();
              }
          });
          return false;

      });

    });

})(jQuery);