$(document).ready(function(){

    var divNews = $('#news');
    var divBio = $('#bio');
    var divMedia = $('#media');
    var divSon = $('#son');
    var divContact = $('#contact');
	
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
		
		if(isSearchOpen){
			content_search.fadeOut('slow');
			
			setTimeout(function(){
				left_search.animate({
					width: '0',
					padding: '0'
				},500);
			},800);
			
			isSearchOpen = false;
		} else {
			content_search.css({display:'none'});
			
			left_search.animate({
				width: '300px',
				padding: '10px'
			},500);
			
			setTimeout(function(){
				content_search.fadeIn('slow');
			},800);
			isSearchOpen = true;
		}
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