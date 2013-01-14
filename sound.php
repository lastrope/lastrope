<?php require_once 'class/Music.php'?>
<?php $music = new Music($pdo,$session->read('langue')); ?>
<?php $albumsId = $music->getAllAlbums(); ?>
<?php $compteurSlide = 1; ?>
<?php $compteurCover = 1; ?>
<div id="albums-slider-container" >
    <div id="albums-left-slider">
	<?php foreach($albumsId as $id): ?>
	    <?php $compteurSong = 1; ?>
	    <div class="album-slider" id="slider-<?php echo $compteurSlide ?>" >
	    <?php foreach($music->getMusicsByAlbums($id['idAlbums']) as $val): ?>
		    <p class="song-title"><span class="song-number"><?php echo $compteurSong++ ?></span>-  <?php echo $val['stitle']; ?>  <span class="song-duration"><?php echo $val['duration']; ?></span></p>
	    <?php endforeach; ?>
	    </div>
	<?php $compteurSlide++; ?>
	<?php endforeach; ?>
    </div>
    <div id="albums-right-panel">
	<?php foreach($albumsId as $album): ?>
	    <div class="album-cover" id="cover-<?php echo $compteurCover ?>">
		<img class="cover" alt="<?php echo $album['name']; ?>" src="/public/media/image/<?php echo $album['cover']; ?>" />
	    </div>
	    <?php $compteurCover++; ?>
	<?php endforeach; ?>
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
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	-o-border-radius:10px;
	-ms-border-radius:10px;
	border-radius:10px;
	overflow:hidden;

    }
    
    .song-title{
	font-size:16px;
	font-family:Helvetica;
	margin-bottom: 4px;
	
    }
    .control-btn{
	border:0 none;
	background:url('/public/media/image/sprite-control.png');
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
	background:url('/public/media/image/bg-panel-control.png');

    }
    #albums-left-slider{
	position:relative;
	overflow:hidden;
	
	float:left;
	height:300px;
	width:400px;
	background:url('/public/media/image/creampaper.png');
    }
    #albums-right-panel{
	float:left;
	width:300px;
	height:300px;
	background:#323232;
	position:relative;
	overflow:hidden;
    }
    .album-slider{
	width:400px;
	height:300px;
	position:absolute;
	padding:7px 0 0;
    }
    .album-cover{
	position:absolute;
	top:0;
	left:0;
	display:none;
    }
    .cover{
	height:300px;
	
    }
    .song-duration{
	font-size:14px;
	color:#323232;
	font-style:italic;
    }
    .song-number{
	width:35px;
	text-align: center;
	display:block;
	float:left;
	color:#6E443D;
	font-weight:bold;
	font-style:oblique;
	
    }
    .control-btn:hover{
	cursor: pointer;
    }

    .next{
	background-position:43px 0px;
    }
    .play{
	background-position:-100px 2px;
    }

    .stop{
	background-position:-55px 2px;
    }
    .prev:hover{
	background-position:0px -45px;
    }
    .next:hover{
	background-position:43px -45px;
    }
    .play:hover{
	background-position:-100px -43px;
    }

    .stop:hover{
	background-position:-55px -43px;
    }
</style>
<script type="text/javascript" src="/public/js/soundSlider.js"></script>
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