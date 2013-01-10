
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
	
    </div>
    <button>TEST</button>
    <div class="clear"></div>
</div>
<style>
    #albums-slider-container{
	margin:140px auto 20px;
	width:700px;
	height:300px;
	
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
    
</style>
<script type="text/javascript">
    
$(document).ready(function(){
    nb_slide =  $('#albums-left-slider > div').length;
    pause = false;
    position = 1;
    $('button').click(function(){
	
    });
});
function init(){
    var init_position = 0;
    $('.album-slider').each(function(){
	$(this).css({'left':init_position+'px'});
	init_position =  init_position + 400;
    });

}
function reset(){
    var init_position = 0;
    $('.album-slider').each(function(){
	$(this).animate({'left':init_position+'px'});
	init_position =  init_position + 400;
    });
}
function start(){
    $('.album-slider').each(function(i){
	if(i == nb_slide){
	    reset();
	}
    });
}
function pause(){
    
}
function next(){
    
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