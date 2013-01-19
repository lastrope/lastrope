<?php require_once 'class/Music.php'?>
<?php $music = new Music($pdo,$session->read('langue')); ?>
<?php $albumsId = $music->getAllAlbums(); ?>
<?php $compteurSlide = 1; ?>
<?php $compteurCover = 1; ?>
<?php $compteurAlbum = 1; ?>
<div id="sound-left-column">
    <h1><?php echo DISCOGRAPHY;?></h1>
    <div id="albums-slider-container" >
	<div id="albums-names">
	    <?php foreach($music->getAlbumsName() as $val): ?>
	    
	    <div id="album-name-<?php echo $compteurAlbum ?>" <?php if($compteurAlbum != 1)echo"style='display:none;'" ?> class="album-names-slide">
		<h2><?php echo $val['name'] ?></h2>
	    </div>
	    <?php $compteurAlbum++; ?>
	    <?php endforeach; ?>
	</div>
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
	    <div class="album-cover-detail" id="cover-<?php echo $compteurCover ?>-detail">
		<p>Album : </p>
		<p><?php echo $album['name']; ?></p>
		<p>Date : </p>
		<p><?php echo $album['date']; ?></p>
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
</div>
<script type="text/javascript" src="/public/js/soundSlider.js"></script>
<div id="sound-right-column">
    <h1><?php echo PLAYLIST ?></h1>
    <div id="player-container">
	<div id="player-container-left">
	    <div id="player-left-title">TITRE</div>
	    <ul>
		<li><a href="javascript:void(0)" id="song-1">Titre de chanson 1</a></li>
		<li><a href="javascript:void(0)" id="song-2">Titre de chanson 2</a></li>
		<li><a href="javascript:void(0)" id="song-3">Titre de chanson 3</a></li>
		<li><a href="javascript:void(0)" id="song-4">Titre de chanson 4</a></li>
	    </ul>
	</div>
	<div id="player-container-right">
	    <div class="song-player-container">
		<label> Titre de la musique <span class="duration">01:45</span></label><br/>
		<div class="song-player">
		    <audio  controls=""> 
			<source src="/public/media/music/Periphery.ogg"  />
			<p class="warning">Le format *.mp3 n'est pas pris en charge par votre navigateur</p>
		    </audio>
		</div>
	    </div>
	</div>

    </div>
</div>
<style>
    #player-left-title{
	height:43px;
	background:url('/public/media/image/bg-panel-control.png');
	font-weight:lighter;
	font-style: oblique;
	text-shadow: 0em 0em 0.5em #FFFFFF;
	color:#FFFFFF;
	font-size:24px;
	text-align: center;
	padding-top:7px;
    }
    #player-container-left{
	width:210px;
	min-height: 350px;
	float:left;
	
    }
    #player-container-left a{
	display:block;
	padding:2px 10px;
	color:#323232;
	border-bottom: 1px dotted #AAAAAA;
    }
    #player-container-left a:hover{
	background: #7F554E;
	color:#FFFFFF;
    }
    #player-container-right{
	width:488px;
	min-height: 350px;
	float:left;
	border-left: 1px solid #AAAAAA;
	padding-top:5px;
    }
    #player-container-right label{
	padding-left:10px;
    }
    .song-player{
	margin-top:5px;
	padding-left:10px;
    }
</style>
<div class="clear"></div>
<!-- 
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


<script src="/public/js/drplayer.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
	
	$("#player-container").playlist(
	{
	    playerurl: "/public/js/swf/drplayer.swf"
	}
    );
    });
    
</script> --!>
<!--[if IE]>
<script type="text/javascript">
    
</script>
<![endif]-->