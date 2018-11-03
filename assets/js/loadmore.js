;(function($){
  $(document).ready(function(){
       $('#loadmore').on('click',function(){
         var nexturl = $(this).attr('href');
         $.get(nexturl,{},function(data){
           var posts = $(data).find('#posts-container').html();
           console.log(posts);
           $("#posts-container").append(posts);
           var newpagelink = $(data).find("#loadmore").attr("href");
           //console.log(newpagelink);
           if(newpagelink){
          
              $("#loadmore").attr("href", newpagelink);
           }
           else{
           	   $("#loadmore").hide("slow");
           }
         });
         return false;
       });
       var newpagelink = $("#loadmore").attr("href");
       if(!newpagelink){
       	  $("#loadmore").hide("slow");
       }
  });
})(jQuery);