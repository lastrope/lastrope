<?php
    require_once 'class/Video.php';
    require_once 'class/AlbumPhoto.php';
    
    $Video = new Video($pdo,$session->read('langue'));
    $videos = $Video->getAllVideo();
    
    $AlbumPhoto = new AlbumPhoto($pdo,$session->read('langue'));
    $albums = $AlbumPhoto->getAllAlbumPhoto();
    
    $x_videos_array = array();
    for($k = 0; $k < count($videos); $k++){
	$x_videos_array[] = rand(0,2);
    }
    $y_videos_array = array();
    for($k = 0; $k < count($videos); $k++){
	$temp = rand(0,3);
	
	while(in_array($temp, $y_videos_array)){
	    $temp = rand(0,3);
	}
	$y_videos_array[] = $temp;
    }
    sort($x_videos_array);
    sort($y_videos_array);
    reset($videos);
    
    
    $x_album_array = array();
    for($k = 0; $k < count($albums); $k++){
	$x_album_array[] = rand(0,2);
    }
    $y_album_array = array();
    for($k = 0; $k < count($albums); $k++){
	$temp = rand(0,3);
	
	while(in_array($temp, $y_album_array)){
	    $temp = rand(0,3);
	}
	$y_album_array[] = $temp;
    }
    sort($x_album_array);
    sort($y_album_array);
    reset($albums);
?>

<div id="conteneur">
    <div class="left-column">
	<h1><?php echo VIDEO_TITLE;?></h1>
	
	<?php
	    $cpt = 0;
	    for($j = 0; $j < 4; $j++){
		for($i = 0; $i < 3; $i++){
		    if($cpt < count($videos) && $x_videos_array[$cpt] == $i && $y_videos_array[$cpt] == $j){
			$object = current($videos);
			
			echo '<div class="cube-preview active-vignette" data-id="' . $object["idVideo"] . '" style="' . (count(explode(' ', $object["title"])) > 1 ? 'padding-top: 30px; height: 106px;' : '') . '">' .
				$object["title"]
				. '</div>';
			$cpt++;
			next($videos);
		    }
		    else {
			echo '<div class="cube-preview"></div>';
		    }
		}
	    }
	?>
    </div>
    
    <div class="right-column">
	<h1><?php echo IMAGE_TITLE;?></h1>
	
	<?php
	    $cpt = 0;
	    for($j = 0; $j < 4; $j++){
		for($i = 0; $i < 3; $i++){
		    if($cpt < count($albums) && $x_album_array[$cpt] == $i && $y_album_array[$cpt] == $j){
			$object = current($albums);
			
			echo '<div class="cube-preview active-vignette" data-id="' . $object["idAlbum"] . '" style="' . (count(explode(' ', $object["nomAlbum"])) > 1 ? 'padding-top: 30px; height: 106px;' : '') . '">' .
				$object["nomAlbum"]
				. '</div>';
			$cpt++;
			next($albums);
		    }
		    else {
			echo '<div class="cube-preview"></div>';
		    }
		}
	    }
	?>
    </div>
    <div class="clear" ></div>
</div>