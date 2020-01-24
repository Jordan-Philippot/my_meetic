

$(function() {
  
    console.log($('#subscrib')[0]);
    $("#subscrib").fadeOut("slow",function(){
        console.log($(this));
      $(this).fadeIn("slow");
    }); 
});
