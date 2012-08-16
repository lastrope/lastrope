$(document).ready(function(){

    var divNews = $('#news');
    var divBio = $('#bio');
    var divMedia = $('#media');
    var divSon = $('#son');
    var divContact = $('#contact');
	
	var isNavOpen = false;
	var isSearchOpen = false;
	
	var effet = 'easeOutElastic';
	var temoin = false;
	
	$('li').each(function(){
		if($(this).hasClass('selected')){
			temoin = true;
		}
	});
	if(temoin){
		var default_left = Math.round($('li.selected').offset().left - $('#header').offset().left);
		var default_width = $('li.selected').width();
	} else {
		default_left = 0;
		default_width = 0;
	}
	var default_active = divNews;
	
	$('#box').css({left: default_left});
	$('#rectangle').css({width: default_width});
	
	// Rollover menu
	$('#header li.menu').hover(function(){
		left = Math.round($(this).offset().left - $('#header').offset().left);
		width = $(this).width();
		
		$('#box').stop().animate({left:left},{duration:1000, easing:effet});
		$('#rectangle').stop().animate({width:width},{duration:1000, easing:effet});
	},function(){		
		$('#box').stop().animate({left:default_left},{duration:1000, easing:effet});
		$('#rectangle').stop().animate({width:default_width},{duration:1000, easing:effet});
	});
	
	// jquery for showing news navigation
	$('#image_front').click(function(){
		left_search = $('#selecteur');
		content_search = $('#content_bis');
		
		if(isNavOpen){
			content_search.fadeOut('slow');
			
			setTimeout(function(){
				left_search.animate({
					width: '0',
					padding: '0'
				},500);
			},800);
			
			setTimeout(function(){
				$('#image_front').css({'background-image':'url(public/media/image/search.png)'});
			},900);
			isNavOpen = false;
		} else {
			content_search.css({display:'none'});
			
			left_search.animate({
				width: '300px',
				padding: '10px'
			},500);
			
			setTimeout(function(){
				content_search.fadeIn('slow');
			},800);
			
			$('#image_front').css({'background-image':'url(public/media/image/search_moins.png)'});
			isNavOpen = true;
		}
	});
	$('#image_back').click(function(){
		right_search = $('#search_form');
		content_search = $('#content_form');
		
		if(isSearchOpen){
			content_search.fadeOut('slow');
			$('#content_answer').css({display:'none'});
			$('.div_answer').css({display:'none'});
				
			setTimeout(function(){
				right_search.animate({
					width: '0',
					padding: '0'
				},500);
			},800);
			
			setTimeout(function(){
				$('#image_back').css({'background-image':'url(public/media/image/search.png)'});
			},900);
			isSearchOpen = false;
		} else {
			content_search.css({display:'none'});
			
			right_search.animate({
				width: '300px',
				padding: '10px'
			},500);
			
			setTimeout(function(){
				$('#content_answer').css({display:'block'});
				$('.div_answer').css({display:'block'});
				
				content_search.fadeIn('slow');
			},800);
			
			$('#image_back').css({'background-image':'url(public/media/image/search_moins.png)'});
			isSearchOpen = true;
		}
	});
	$('.div_answer').click(function(){
		if($(this).hasClass('selected_answer')){
			$(this).removeClass('selected_answer');
		} else {
			$(this).addClass('selected_answer');
		}
	});
	$('#search_value_id').focus(function(){
		$('#search_value_id').removeClass('input_text_passive');
		$('#search_value_id').addClass('input_text_active');
	});
	$('#search_value_id').blur(function(){
		$('#search_value_id').removeClass('input_text_active');
		$('#search_value_id').addClass('input_text_passive');
	});
});
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
    $('#logo_loader').animate({'top':'42px'},1500).fadeOut(600);
    $('#bottom_loader').animate({'height':'0px'},2500);
    $('#top_loader').animate({'height':'0px'},2500);
}
// Ajax for load news
function load_news_text(id,title){
	if(id == 0 && (title == 'fr' || title == 'en')){
		url = title + '-news';
		$(location).attr('href',url);
	} else {
		setTimeout(function(){
			$.post("script/chargeNews.php", {id: id,title: title},  
				function success(data){
					$('#article_content').empty();
					$('#article_content').append(data);
				});
		},800);
	}
}