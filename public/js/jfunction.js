$(document).ready(function(){
    var divNews = $('#news');
    var divBio = $('#bio');
    var divMedia = $('#media');
    var divSon = $('#son');
    var divContact = $('#contact');
    var default_active = divNews;
	
    var isNavOpen = false;
    var isSearchOpen = false;
    var temoin = false;
	
    var effet = 'easeOutElastic';
	
    var widthWindowOnLoad = (($(window).width()-600)/2);
	
    // Initialization of the rollhover menu
    // If One Item is already selected put the boolean at "True"
    $('li').each(function(){
	if($(this).hasClass('selected')){
	    temoin = true;
	}
    });
    // If there is an item already selected, take its offset left for the hover animation
    // Else, take 0
    if(temoin){
	var default_left = Math.round($('li.selected').offset().left - $('#header').offset().left);
	var default_width = $('li.selected').width();
    } else {
	default_left = 0;
	default_width = 0;
    }
    // Initialization of the rollhover object position
    $('#box').css({
	left: default_left
    });
    $('#rectangle').css({
	width: default_width
    });
	
    // Rollover menu
    $('#header li.menu').hover(function(){
	left = Math.round($(this).offset().left - $('#header').offset().left);
	width = $(this).width();
		
	$('#box').stop().animate({
	    left:left
	},{
	    duration:1000, 
	    easing:effet
	});
	$('#rectangle').stop().animate({
	    width:width
	},{
	    duration:1000, 
	    easing:effet
	});
    },function(){		
	$('#box').stop().animate({
	    left:default_left
	},{
	    duration:1000, 
	    easing:effet
	});
	$('#rectangle').stop().animate({
	    width:default_width
	},{
	    duration:1000, 
	    easing:effet
	});
    });
	
    // jquery for showing news navigation left on the page loading
    $('#selecteur').animate({
	'left':'0'
    },1200);
    
    $('.left-column .close p').live('click', function(){
	$('.video-preview').remove();
    });

    $('.left-column .active-vignette').click(function(){
	var idVideo = $(this).attr('data-id');
	var $this = $(this);
	
	$.ajax({
	    type : "post",
	    url : "script/showVideo.php",
	    data : {'idVideo':idVideo},
	    success:function(response){
		$(".left-column").append(response);
	    }
	});
    });
    $('#carousel-container .close p').live('click', function(){
	$('#carousel-container').remove();
    });

    $('.right-column .active-vignette').click(function(){
	var idAlbum = $(this).attr('data-id');
	var $this = $(this);
	
	$.ajax({
	    type : "post",
	    url : "script/showNav.php",
	    data : {'idAlbum':idAlbum},
	    success:function(response){
		$("#global").append(response);
	    }
	});
    });
    
    setTimeout(function(){
	$('#content_answer').css({
	    display:'block'
	});
	$('.div_answer').css({
	    display:'block'
	});

	$('#content_form').fadeIn('slow');
    },1000);
   
    // ## For te search action 
    $("#form_search_action").click(function(){
	var where = $("#type_search").val();
	var what = $("#search_value_id").val();
	$.ajax({
	    type : "post",
	    url : "script/search.php",
	    data : {'what':what,'where':where},
	    success:function(response){
		$("#article_content").html(response);
	    }
	});
    });
    // For the research formulaire
    $('.div_answer').click(function(){
	if($(this).hasClass('selected_answer')){
	    $(this).removeClass('selected_answer');
			
	    var current_value = $('#type_search').val();
	    current_value = current_value.replace($(this).attr("id"),'');
			
	    $('#type_search').val(current_value);
	} else {
	    $(this).addClass('selected_answer');
			
	    if($('#type_search').val() == ""){
		$('#type_search').val($(this).attr("id"));
	    } else {
		$('#type_search').val($('#type_search').val() + ' ' + $(this).attr("id"));
	    }
	}
    });
    // For the members transition
    $('.member_container').hover(function(){
	// Change dimensions
	$(this).find(':first').next().stop().animate({
	    'height':'0'
	},800);
	$(this).find(':first').stop().animate({
	    'height':'0'
	},800);
    }, function(){
	// Change dimensions
	$(this).find(':first').stop().animate({
	    'height':'220px'
	},800);
	$(this).find(':first').next().stop().animate({
	    'height':'180px'
	},800);
    });
	
    // Members invisible div
    $('.bio_member, .img_member').click(function(){
	$(this).parent().parent().children('.more_about_him').fadeIn('slow');
    });
    $('.more_about_him').click(function(){
	$(this).fadeOut('slow');
    });
	
    // For scrolling content on bio page
    $('#switch').click(function(){
	var direction = $(this).attr('class');
	$(this).removeClass(direction);
	if(direction == "top"){
	    scrollTo('top');
	    $(this).addClass('bottom');
	}else if(direction == "bottom"){
	    scrollTo('bottom');
	    $(this).addClass('top');
	}
    });
    
	
    // Check if the scroll in the page is on a keypoint for changing image
    $(window).scroll(function(){
	if($(window).scrollTop() <= ($('#members_container').offset().top+370)){
	    $('#switch').css({
		'background':'#2B5A74 url(public/media/image/fleche_bottom.png) center center no-repeat'
	    });
	    
	} else {
	    $('#switch').css({
		'background':'#cecdce url(public/media/image/fleche_top_black.png) center center no-repeat'
	    });
	}
    });
	
    // Change the appearance of the input on the search form
    $('#search_value_id').focus(function(){
	$('#search_value_id').removeClass('input_text_passive');
	$('#search_value_id').addClass('input_text_active');
    });
    $('#search_value_id').blur(function(){
	$('#search_value_id').removeClass('input_text_active');
	$('#search_value_id').addClass('input_text_passive');
    });
	
    $('.news-content').animate({
	'margin':'0 0 0 '+widthWindowOnLoad+'px'
    });

    // Si l'on ferme le panel droite de recherche alors qu'il reste des caract�res de saisi
    $('#image_back').live('click',function(){
	// on r�initialise tout
	$('.selected_answer').removeClass('selected_answer');
	$('#type_search').val('');
		
	if($('#content_form').css('display') != 'none'){
	    closePreview();
	    $('#search_value_id').val('');
	    sort_actu();
	}
    });
    $('.bubble_period').hover(function(){
	$(this).children('.bubble_period_hover').css({
	    'top':$('.bubble_container').height(),
	    'display':'block'
	});
		
	$(this).children('.bubble_period_hover').fadeIn(500);
		
    }, function(){
	$(this).children('.bubble_period_hover').fadeOut(500);
    });
});
// Animation for the website opening
function loader(){
    $('#corps').hide();
	
    var screenHeight = $(window).height()+"px";
    var halfScreen = ($(window).height()/2)+"px";
    var logo_top_margin = (($(window).height()/2)-(155/2))+"px";
    var logo_left_margin = (($(window).width()/2)-(155/2))+"px";
	
    $('#loader').css('height',screenHeight);
    $('#top_loader').css('height',halfScreen);
    $('#bottom_loader').css('height',halfScreen);
    $('#logo_loader').css('top',logo_top_margin);
    $('#logo_loader').css('left',logo_left_margin);
	
    $('#corps').fadeIn(4000);
    $('#logo_loader').animate({
	'top':'42px'
    },1500).fadeOut(600);
    $('#bottom_loader').animate({
	'height':'0px'
    },2500);
    $('#top_loader').animate({
	'height':'0px'
    },2500);
}
// Ajax for load news
function load_news_text(id,type){
    
    setTimeout(function(){
	$.post("script/chargeNews.php", {
	    id: id,
	    type: type
	},  
	function success(data){
	    $('#article_content').empty();
	    $('#article_content').append(data);
	});
    },200);
   
}
// Ajax for load news
function load_news_text_search(id,type){
    
    setTimeout(function(){
	$.post("script/chargeNews.php", {
	    id: id,
	    type: type
	},  
	function success(data){
	    $('#article_found').hide();
	    $('#article_found').empty();
	    $('#article_found').append(data);
	    $('#article_found').fadeIn();
	});
    },200);
   
}

// SCROLL BIO BLEU
function scrollTo(direction){
    var height = "";
    if(direction == 'top'){
	height = $('#members_container').offset().top-250;
	$('#members_switch').css({
	    'background':'#cecdce url(public/media/image/fleche_right.png) center center no-repeat'
	});
	$('#general_switch').css({
	    'background':'#2B5A74 url(public/media/image/fleche_bottom.png) center center no-repeat'
	});
    } else {
	height = $('#bio_gen').offset().top;
	$('#members_switch').css({
	    'background':'#cecdce url(public/media/image/fleche_top_black.png) center center no-repeat'
	});
	$('#general_switch').css({
	    'background':'#2B5A74 url(public/media/image/fleche_right_white.png) center center no-repeat'
	});
    }
	
    $('html,body').stop().animate({
	scrollTop:height
    },1000);
}
// FONCTION DE CHARGEMENT ET TRI DES ACTUS
function sort_actu(){
    var lang = $("#tag_lang").val();
    $.ajax({
	type:'post',
	url:'sort_actu.php',
	data:{
	    'lang':lang
	},
	success:function(actus){
	    $("#article_content").html(actus);
	}
    });
}
function verif_search(){
    var search = document.getElementById('search_value_id');
	
    if(search.value == ""){
	search.className = 'input_text_passive incorrect';
	alert('Veuillez renseigner au moins un mot clef.');
	return false;
    } else {
	search.className = 'input_text_passive';
	return true;
    }
}