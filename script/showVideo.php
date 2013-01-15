<?php
    include("../class/Video.php");
    include("../bootstrap.php");
    $id_video = intval($_POST["idVideo"]);
    
    $Video = new Video($pdo,$session->read('langue'));
    $the_video = $Video->getVideoById($id_video);
    
?>
<div class="video-preview">
    <?php echo $the_video["url"]; ?>
    
    <div class="close">
	<p><?php echo CLOSE_WINDOW;?></p>
    </div>
</div>