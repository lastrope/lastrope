<?php
    define("__host_absolute__", "../");
    define("__path_photo__", "public/media/photo");
    
    $dir = opendir(__host_absolute__ . __path_photo__ . "/" . $target_album["dateAlbum"]);
    
    $photos = array();
    while($photo = readdir($dir)){
	if($photo == "." || $photo == "..")
	    continue;
	
	$photos[] = $photo;
    }
?>
