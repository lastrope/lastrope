$(function(){

    divNews = $('#news');
    divBio = $('#bio');
    divMedia = $('#media');
    divSon = $('#son');
    divContact = $('#contact');
	
	// NEW HOVER
	divNews.hover(function(){
		divBio.animate({
			opacity:0.3,
			
		},600);
		divMedia.animate({
			opacity:0.3,
			
		},600);
		divSon.animate({
			opacity:0.3,
			
		},600);
		divContact.animate({
			opacity:0.3,
			
		},600);
	},function(){
		divBio.animate({
			opacity:1,
			
		},600);
		divMedia.animate({
			opacity:1,
			
		},600);
		divSon.animate({
			opacity:1,
			
		},600);
		divContact.animate({
			opacity:1,
			
		},600);
	});
	// BIO HOVER
	divBio.hover(function(){
		divNews.animate({
			opacity:0.3,
			
		},600);
		divMedia.animate({
			opacity:0.3,
			
		},600);
		divSon.animate({
			opacity:0.3,
			
		},600);
		divContact.animate({
			opacity:0.3,
			
		},600);
	},function(){
		divNews.animate({
			opacity:1,
			
		},600);
		divMedia.animate({
			opacity:1,
			
		},600);
		divSon.animate({
			opacity:1,
			
		},600);
		divContact.animate({
			opacity:1,
			
		},600);
	});
	// MEDIA HOVER
	divMedia.hover(function(){
		divNews.animate({
			opacity:0.3,
			
		},600);
		divBio.animate({
			opacity:0.3,
			
		},600);
		divSon.animate({
			opacity:0.3,
			
		},600);
		divContact.animate({
			opacity:0.3,
			
		},600);
	},function(){
		divNews.animate({
			opacity:1,
			
		},600);
		divBio.animate({
			opacity:1,
			
		},600);
		divSon.animate({
			opacity:1,
			
		},600);
		divContact.animate({
			opacity:1,
			
		},600);
	})
	// SON HOVER
	divSon.hover(function(){
		divNews.animate({
			opacity:0.3,
			
		},600);
		divMedia.animate({
			opacity:0.3,
			
		},600);
		divBio.animate({
			opacity:0.3,
			
		},600);
		divContact.animate({
			opacity:0.3,
			
		},600);
	},function(){
		divNews.animate({
			opacity:1,
		},600);
		divMedia.animate({
			opacity:1,
		},600);
		divBio.animate({
			opacity:1,
		},600);
		divContact.animate({
			opacity:1,
		},600);
	})
	// CONTACT HOVER
	divContact.hover(function(){
		divNews.animate({
			opacity:0.3,
		},600);
		divMedia.animate({
			opacity:0.3,
		},600);
		divSon.animate({
			opacity:0.3,
		},600);
		divBio.animate({
			opacity:0.3,
		},600);
	},function(){
		divNews.animate({
			opacity:1,
		},600);
		divMedia.animate({
			opacity:1,
		},600);
		divSon.animate({
			opacity:1,
		},600);
		divBio.animate({
			opacity:1,
		},600);
	})
	// Responsive design function resize
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
	})
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
});