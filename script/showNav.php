<?php
    include("../class/Photo.php");
    include("../class/AlbumPhoto.php");
    include("../bootstrap.php");
    $id_album = intval($_POST["idAlbum"]);
    
    $Album = new Photo($pdo,$session->read('langue'));
    $AlbumPhoto = new AlbumPhoto($pdo, $session->read('langue'));
    
    $the_album = $Album->getPhotosByAlbum($id_album);
    $album_target = $AlbumPhoto->getAlbumById($id_album);
    
    $target_album = current($album_target);
    
    include("../page/nav.phtml");
?>
