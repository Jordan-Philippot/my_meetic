/*$([name="loisir"]).hide();
$(document).ready(function(){
    $("#toggle_loisir").click(function(){
        if($([name="loisir"]).hide()){
            $([name="loisir"]).toggle();
        }
    });
});
*/

$(function() {
    alert("bonjour");
    console.log($('#subscrib')[0]);
    $("#subscrib").fadeOut("slow",function(){
        console.log($(this));
      $(this).fadeIn("slow");
    }); 
});
