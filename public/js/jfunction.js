$(document).ready(function(){

    var divNews = $('#news');
    var divBio = $('#bio');
    var divMedia = $('#media');
    var divSon = $('#son');
    var divContact = $('#contact');
	
	var effet = 'easeOutElastic';
	var default_left = Math.round($('li.selected').offset().left - $('#header').offset().left);
	var default_width = $('li.selected').width();
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
	
		// Responsive design function onload
		$(window).load(function(){
			if($('body').width() < 1200){
				$('#welcome').css({
					width:0,
					height:0
				});
				$('#welcome').empty();
				$('#article').css({
					margin:'0 0 0 20px'
				});
			}else if ($('body').width() > 1200){
				$('#welcome').css({
					width:'300px',
					height:'166px'
				});
				$('#welcome').html('<p>Bienvenue sur le site de Lastrope !</p>');
				$('#article').css({
					margin:'auto'
				});
			}
			if($('body').height() < 700){
				$('footer').empty();
			}else if($('body').height() > 700){
				$('footer').html('<div id="complement_back"><div id="footer"></div><div id="copyright"></div></div>');
			}
		})
		// Responsive design function on resize
		$(window).resize(function(){
			if($('body').width() < 1200){
				$('#welcome').css({
					width:0,
					height:0
				});
				$('#welcome').empty();
				$('#article').css({
					margin:'0 0 0 20px'
				});
			}else if ($('body').width() > 1200){
				$('#welcome').css({
					width:'300px',
					height:'166px'
				});
				$('#welcome').html('<p>Bienvenue sur le site de Lastrope !</p>');
				$('#article').css({
					margin:'auto'
				});
			}
			if($('body').height() < 700){
				$('footer').empty();
			}else if($('body').height() > 700){
				$('footer').html('<div id="complement_back"><div id="footer"></div><div id="copyright"></div></div>');
			}
		});
});