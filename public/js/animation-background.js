$(document).ready(function(){
	var perso1Left = 10;
	var perso2Left = 50;
	var perso3Left = 100;
	var perso4Left = 150;
	var perso1 = $('.perso1');
	var perso2 = $('.perso2');
	var perso3 = $('.perso3');
	var perso4 = $('.perso4');
	
	$('.perso1').animate({
		'left':perso1Left + 'px'
	},1000,'linear',walk1(perso1,perso1Left));
	$('.perso2').animate({
		'left':perso2Left + 'px'
	},1000,'linear',walk2(perso2,perso2Left));
	$('.perso3').animate({
		'left':perso3Left + 'px'
	},1000,'linear',walk3(perso3,perso3Left));
	$('.perso4').animate({
		'left':perso4Left + 'px'
	},1000,'linear',walk4(perso4,perso4Left));
});
function walk1(div,height){
	var windowLeft = $(window).width();
	setTimeout(function(){
		if(height < windowLeft){
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000,'linear',walk(div,height));
		}
		else {
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000);
		}
	},8500);
}
function walk2(div,height){
	var windowLeft = $(window).width();
	setTimeout(function(){
		if(height < windowLeft){
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000,'linear',walk(div,height));
		}
		else {
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000);
		}
	},7000);
}
function walk3(div,height){
	var windowLeft = $(window).width();
	setTimeout(function(){
		if(height < windowLeft){
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000,'linear',walk(div,height));
		}
		else {
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000);
		}
	},5500);
}
function walk4(div,height){
	var windowLeft = $(window).width();
	setTimeout(function(){
		if(height < windowLeft){
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000,'linear',walk(div,height));
		}
		else {
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000);
		}
	},4000);
}
function walk(div,height){
	var windowLeft = $(window).width();	
	setTimeout(function(){
		if(height < windowLeft){
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000,'linear',walk(div,height));
		}
		else {
			height += 30;
			div.animate({
				'left':height + 'px'
			},1000);
		}
	},7000);
}
