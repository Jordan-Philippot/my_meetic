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
    $("p").fadeOut("slow",function(){
      $(this).fadeIn("slow");
    }); 
});
