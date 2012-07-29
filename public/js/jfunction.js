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
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	},function(){
		divBio.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	});
	// BIO HOVER
	divBio.hover(function(){
		divNews.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	},function(){
		divNews.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	});
	// MEDIA HOVER
	divMedia.hover(function(){
		divNews.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divBio.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	},function(){
		divNews.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divBio.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	});
	// SON HOVER
	divSon.hover(function(){
		divNews.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divBio.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	},function(){
		divNews.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divBio.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divContact.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	});
	// CONTACT HOVER
	divContact.hover(function(){
		divNews.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divBio.animate({
			opacity:0.3,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	},function(){
		divNews.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divMedia.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divSon.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
		divBio.animate({
			opacity:1,
			'text-shadows':'2px 2px 2px rgba(250,250,250,0.7)'
		},600);
	});
});