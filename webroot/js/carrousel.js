$(document).ready(function(){
    
var $carrousel = $('#carrousel'),
    $profil = $('#carrousel .container_result'), 
    indexProfil = $profil.length - 1, 
    y = 0, 
    $currentProfil = $profil.eq(y); 

$profil.css('display', 'none'); 
$currentProfil.css('display', 'block'); 

$profil.append('<div class="controls"> <div class="prev"> &#60</div> <div class="next">&#62</div> </div>');

$('.next').click(function(){ 

    y++; 

    if( y <= indexProfil ){
        $profil.css('display', 'none'); 
        $currentProfil = $profil.eq(y);
        $currentProfil.css('display', 'block'); 
    }
    else{
        y = indexProfil;
    }

});

$('.prev').click(function(){ 

    y--;

    if( y >= 0 ){
        $profil.css('display', 'none');
        $currentProfil = $profil.eq(y);
        $currentProfil.css('display', 'block');
    }
    else{
        y = 0;
    }

});

function slideProfil(){
    setTimeout(function(){ 
						
        if(y < indexProfil){ 
	    y++; 
	}
	else{ 
	    y = 0;
	}

	$profil.css('display', 'none');

	$currentProfil = $profil.eq(y);
	$currentProfil.css('display', 'block');

	slideProfil();

    }, 5000);
}

slideProfil(); 

});
