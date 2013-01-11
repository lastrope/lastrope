
<div id="albums-slider-container" >
    <div id="albums-left-slider" class="stop-slider">
	<div class="album-slider active-slide" id="slider-1">
	    
	</div>
	<div class="album-slider" id="slider-2">
	    
	</div>
	<div class="album-slider" id="slider-3">
	    
	</div>
	
    </div>
    <div id="albums-right-panel">
	<div id="control-panel">
	    <button class="prev control-btn">prev</button>
	    <button class="play control-btn">play</button>
	    <button class="stop control-btn">stop</button>
	    <button class="next control-btn">next</button>
	</div>
    </div>
    
    <div class="clear"></div>
</div>
<style>
    #albums-slider-container{
	margin:140px auto 20px;
	width:700px;
	height:300px;
	
    }
    .control-btn{
	border:0 none;
	background:url(/public/media/image/sprite-control.png);
	color:transparent;
	height:40px;
	width:40px;
	margin: 0px 5px;
    }
    #control-panel{
	height:50px;
	width:100%;
	background:#fff;
	position:absolute;
	bottom:-150px;
	text-align: center;
	background:url(/public/media/image/bg-panel-control.png);
    }
    #albums-left-slider{
	position:relative;
	overflow:hidden;
	float:left;
	height:300px;
	width:400px;
    }
    #albums-right-panel{
	float:left;
	width:300px;
	height:300px;
	background:#0000FF;
	position:relative;
    }
    .album-slider{
	width:400px;
	height:300px;
	position:absolute;
    }
    #slider-1{
	background:#FF0000;
	
	
    }
    #slider-2{
	background:#FFFF00;
	
    }
    #slider-3{
	background:#AADD00;
	
    }
    .control-btn:hover{
	cursor: pointer;
	
    }
    
    .next{
	background-position:43px 0px;
    }
    .play{
	background-position:-100px 0px;
    }

    .stop{
	background-position:-55px 0px;
    }
    
    
</style>
<script type="text/javascript">
    
$(document).ready(function(){
    nb_slide =  $('#albums-left-slider > div').length;
    pause = false;
    position = 1;
    duration = 4000;
    widthSlider = 400;
    init();
    interval = "";
    setTimeout('start()',duration)
    $('.play').click(function(){
	start();
    });
    $('.stop').click(function(){
	stop();
    });
    
    $('.next').click(function(){
	play();
    });
});
function init(){
    var init_position = 0;
    
    $('.album-slider').each(function(){
	$(this).css({'left':init_position+'px'});
	init_position =  init_position + widthSlider;
    });
    $('#control-panel').animate({
	'bottom':'0px'
    },1500);
}
function isTheEnd(){
    if($('.active-slide').attr('id') != 'slider-'+nb_slide){
	return true;
    }
    return false;
}
function backToBegin(){
    var init_position = 0;
    $('.album-slider').each(function(){
	$(this).animate({'left':init_position+'px'});
	init_position =  init_position + widthSlider;
    });
    $('.album-slider').removeClass('active-slide');
    $('#slider-1').addClass('active-slide');
}
function start(){
    stop();
    interval = setInterval('play()',duration);
}
function play(){
    if(isTheEnd()){
        next();
    }else{
	backToBegin();
    }
}
function stop(){
    clearInterval(interval);
}
function reset(){
    stop();
    start();
}
function next(){
    var nextPosition =0;
    var position = 0;
    
    $('.album-slider').each(function(){
	position = $(this).css('left');
	nextPosition = parseInt(position) - widthSlider;
	if(nextPosition == 0){
	    $(this).prev().removeClass('active-slide');
	    $(this).addClass('active-slide');
	}
	$(this).animate({'left':nextPosition+'px'});
    });
    reset();
}
function prev(){
    
}
</script>












<div id="conteneur">
    
    <div id="player-container">
	<div class="item" style="width: 400px;" href="http://devreactor.com/audio/1.mp3">
	    <div>
		<div class="fr duration">02:06</div>
		<div class="btn play"></div>
		<div class="title">
		    <b>The Ting Tings</b>
		    - Shut up and let me go
		</div>
	    </div>
	    <div class="player inactive"></div>
	</div>
	<div class="clear"></div>
	<div class="item" style="width: 400px;" href="/public/media/music/Pub.MP3">
	    <div>
		<div class="fr duration">01:00</div>
		<div class="btn play"></div>
		<div class="title">
		    <b>Pub oasis</b>
		    - Test de music en relative
		</div>
	    </div>
	    <div class="player inactive"></div>
	</div>
	<div class="clear"></div>
	<div id="music-command">
	    <a onclick="$('#player-container').playlist('play');" href="javascript:void(0);" id="play-btn">Play</a>
	    <a onclick="$('#player-container').playlist('pause');" href="javascript:void(0);" id="stop-btn">Pause</a>
	    <a onclick="$('#player-container').playlist('prev');" href="javascript:void(0);" id="prev-btn">Prev</a>
	    <a onclick="$('#player-container').playlist('next');" href="javascript:void(0);" id="next-btn">Next</a>
	</div>
    </div>

</div>
<script src="/public/js/drplayer.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
	
	$("#player-container").playlist(
	    {
		playerurl: "/public/js/swf/drplayer.swf"
	    }
	);
    });
    
</script>