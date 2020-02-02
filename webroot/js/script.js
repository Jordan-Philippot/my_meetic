function loisir1_text() {
  var loisir1 = document.getElementById("loisir");
  loisir1.value += "Danser ";
}
function loisir2_text() {
  var loisir2 = document.getElementById("loisir");
  loisir2.value += "Cuisine ";
}

function loisir3_text() {
  var loisir = document.getElementById("loisir");
  loisir.value += "Poney ";
}

function loisir4_text() {
  var loisir = document.getElementById("loisir");
  loisir.value += "Films ";
}

function toggle(){
  if(document.getElementById('toggle').style.display==='block'){
    document.getElementById('toggle').style.display='none';
  }
  else{
    document.getElementById('toggle').style.display='block';
  }
}

function toggle_search(){
  if(document.getElementById('toggle_search').style.display==='block'){
    document.getElementById('toggle_search').style.display='none';
  }
  else{
    document.getElementById('toggle_search').style.display='block';
  }
}

function toggle_index(){
  if(document.getElementById('toggle_index').style.display==='block'){
    document.getElementById('toggle_index').style.display='none';
  }
  else{
    document.getElementById('toggle_index').style.display='block';
  }
}

function toggle_edit(){
  if(document.getElementById('toggle_edit').style.display==='block'){
    document.getElementById('toggle_edit').style.display='none';
  }
  else{
    document.getElementById('toggle_edit').style.display='block';
  }
}
/*$(function() {
  
    console.log($('#subscrib')[0]);
    $("#subscrib").fadeOut("slow",function(){
        console.log($(this));
      $(this).fadeIn("slow");
    }); 
});*/
