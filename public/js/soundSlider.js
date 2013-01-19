$(document).ready(function(){
    nb_slide =  $('#albums-left-slider > div').length;
    pause = false; // variable témoin autoroll
    duration = 6000; // temps entre chaque slide
    widthSlider = 400; // largeur du slider gauche
    init();
    interval = "";
    setTimeout('start()',duration);
    $('.play').click(function(){
	start();
	pause = false;
    });
    $('.stop').click(function(){
	stop();
	pause = true;
    });
    $('.next').click(function(){
	next();
    });
    $('.prev').click(function(){
	prev();
    });
//    $( ".album-cover" ).bind(
//	"mouseover mouseout",
//	function(){
//	    var albumId = $(this).attr('id');
//	    if($("#"+albumId+"-detail").css('display') == "block"){
//		$("#"+albumId+"-detail").hide();
//	    }else{
//		$("#"+albumId+"-detail").show();
//	    }
//	}
//    );
//   $('.album-cover').hover(function(){
//	var albumId = $(this).attr('id');
//	$("#"+albumId+"-detail").show();
//    },function(){
//	var albumId = $(this).attr('id');
//	$("#"+albumId+"-detail").hide();
//    });
   
});
// positionnement des slides
function init(){
    var init_position = 0;

    $('.album-slider').each(function(){
	$(this).css({'left':init_position+'px'});
	init_position =  init_position + widthSlider;
    });
    $('#slider-1').addClass('active-slide');
    $('#cover-1').fadeIn();
    $('#control-panel').animate({
	'bottom':'0px'
    },1500);
}
// Test si l'on est sur le dernier slide
function isTheEnd(){
    if($('.active-slide').attr('id') != 'slider-'+nb_slide){
	return true;
    }
    return false;
}
// Test si l'on est sur le premier slide
function isTheBegin(){
    if($('.active-slide').attr('id') == 'slider-1'){
	return true;
    }
    return false;
}
// Retour au premier slide
function backToBegin(){
    var init_position = 0;
    $('.album-slider').each(function(){
	$(this).animate({'left':init_position+'px'});
	init_position =  init_position + widthSlider;
    });
    $('.album-slider').removeClass('active-slide');
    $('#slider-1').addClass('active-slide');
}
// Retour au dernier slide
function backToEnd(){
    var init_position = parseInt($('#slider-'+nb_slide).css('left'));
    $('.album-slider').each(function(){
	$(this).animate({'left':'-'+init_position+'px'});
	init_position =   init_position - widthSlider ;
    });
    $('.album-slider').removeClass('active-slide');
    $('#slider-'+nb_slide).addClass('active-slide');
}
// Démarrage de l'autoroll
function start(){
    stop();
    interval = setInterval('next()',duration);
}
// Stop l'autoroll
function stop(){
    clearInterval(interval);
}
// Passe au slide suivant
function next(){
    var nextPosition =0;
    var position = 0;
    var active = parseInt($('.album-slider').css('left'));
    if((active%widthSlider) == 0){
	 stop();
	if(isTheEnd()){
	    $('.album-slider').each(function(){
		position = $(this).css('left');
		    nextPosition = parseInt(position) - widthSlider;
		    if(nextPosition == 0){
			$(this).prev().removeClass('active-slide');
			$(this).addClass('active-slide');
		    }
		    $(this).animate({'left':nextPosition+'px'});
	    });

	}else{
	    backToBegin();
	}
	changeCover();
	if(!pause){
	    start();
	}
    }
}
// Passe au slide précédent 
function prev(){
    var nextPosition =0;
    var position = 0;
    var active = parseInt($('.album-slider').css('left'));
    if((active%widthSlider) == 0){
	stop();
	if(!isTheBegin()){
	    $('.album-slider').each(function(){
		position = $(this).css('left');
		nextPosition = parseInt(position) + widthSlider;
		if(nextPosition == 0){
		    $(this).next().removeClass('active-slide');
		    $(this).addClass('active-slide');
		}
		$(this).animate({'left':nextPosition+'px'});

	    });
	}else{
	    backToEnd();
	}
	changeCover();
	if(!pause){
	    start();
	}
    }
}
// Change la pochette d'album 
function changeCover(){
    $('.album-cover').fadeOut();
    $('.album-names-slide').fadeOut();
    var id = $('.active-slide').attr('id');
    id = id.split('-');
    
    $('#cover-'+id[1]).fadeIn();
    $('#album-name-'+id[1]).fadeIn();
}
/** Responsive **/
$(window).load(function(){
    responsiveSound();
});
$(window).resize(function(){
    responsiveSound();
});
function responsiveSound(){
    
    if(parseInt($(this).width()) < 1560){
	$('#sound-left-column').css({'margin':'140px auto 0px','float':'none'});
	$('#sound-right-column').css({'margin':'30px auto 60px','float':'none'});
	
    }else{
	$('#sound-left-column').css({'margin':'140px 40px 20px','float':'left'});
	$('#sound-right-column').css({'margin':'140px 40px 20px','float':'right'});
    }
}