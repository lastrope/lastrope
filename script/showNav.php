<?php
    include("../class/AlbumPhoto.php");
    include("../bootstrap.php");
    $id_album = intval($_POST["idAlbum"]);
    
    $AlbumPhoto = new AlbumPhoto($pdo, $session->read('langue'));
    
    $album_target = $AlbumPhoto->getAlbumById($id_album);
    
    $target_album = current($album_target);
    include("../script/getPhotos.php");
    include("../page/nav.phtml");
?>
