<?php
	require_once 'class/Actus.php';
	$actus = new Actus($pdo,$session->read('langue'));
	$actusInformation = $actus->getLastFiveActus();
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
?>
<div id="conteneur">
    <div id="article" class="jScrollbar3">
	<div class="jScrollbar_mask">
	    <?php
	    // On affiche les 5 dernières actus sur la page d'accueil
	    foreach ($actusInformation as $this_actu) {
		?>
    	    <article>
			<div class="article_block">
				<div class="titre"><?php echo $this_actu['title']; ?></div>
				<div class="content_article">
					<p>
					<?php echo $this_actu['body']; ?>
					</p>
				</div>
			</div>
    	    </article>
		<?php
	    }
	    ?>
	</div>

	<div class="jScrollbar_draggable">
	    <a href="#" class="draggable"></a>
	</div>

	<div class="clr"></div>
    </div>
</div>