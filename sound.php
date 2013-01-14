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
<script type="text/javascript" src="/public/js/soundSlider.js"></script>


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
    
</script>
<!--[if IE]>
<script type="text/javascript">
    
</script>
<![endif]-->