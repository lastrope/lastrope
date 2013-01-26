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
		<button id="autoplay" class="play">play</button>
		<button class="next control-btn">next</button>
	    </div>
	</div>
	<div class="clear"></div>
    </div>
</div>
<div id="sound-right-column">
    <h1><?php echo PLAYLIST ?></h1>
    <div id="player-container" >
	
	<div id="FlashComponent">
		<p>In order to view this object you need Flash Player 9+ support!</p>
		<a href="http://www.adobe.com/go/getflashplayer">
			<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"/>
		</a>
	</div>
	
    </div>
</div>
<div class="clear"></div>
<script type="text/javascript" src="/public/js/soundSlider.js"></script>
<script type="text/javascript" src="/public/playerMP3/js/swfobject.js"></script>	
<script type="text/javascript">

	// JAVASCRIPT VARS
	// the path to the SWF file
	var swfPath = "/public/playerMP3/preview.swf";
	//swfPath += "?t=" + Date.parse(new Date()); // uncomment this line to activate cache buster		

	// stage dimensions
	var stageW = '690px';//560//"100%"; // minimum is 450
	var stageH = '350px';//400;//"100%"; // minimum is 260


	// ATTRIBUTES
    var attributes = {};
    attributes.id = 'FlashComponent';
    attributes.name = attributes.id;

	// PARAMS
	var params = {};
	params.bgcolor = "#323232";
	params.allowfullscreen = "true";
	params.allowScriptAccess = "always";			
	params.wmode = "transparent";


    /* FLASH VARS */
	var flashvars = {};

	/// if commented / delete these lines, the component will take the stage dimensions defined 
	/// above in "JAVASCRIPT SECTIONS" section or those defined in the settings xml			
	flashvars.componentWidth = stageW;
	flashvars.componentHeight = stageH;							

	/// path to the content folder(where the xml files, images or video are nested)
	/// if you want to use absolute paths(like "http://domain.com/images/....") then leave it empty("")
// Also, if you want the embed code to work correctly you'll need to set the an absolute path for pathToFiles, like this: http://www.yourwebsite.dom/.../mp3gallery/
	flashvars.pathToFiles = "/public/playerMP3/";
	flashvars.xmlPath = "xml/settings.xml.php";
	flashvars.contentXMLPath = "xml/mp3gallery.xml.php";

	/** EMBED THE SWF**/
	swfobject.embedSWF(swfPath, attributes.id, stageW, stageH, "9.0.124", "/public/playerMP3/js/expressInstall.swf", flashvars, params, attributes);
</script>