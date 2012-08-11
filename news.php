<?php
	require_once 'class/Actus.php';
	require_once 'class/Event.php';
	
	$actus = new Actus($pdo,$session->read('langue'));
	$actusInformation = $actus->getAllActus();
	$event = new Event($pdo,$session->read('langue'));
	$eventInformation = $event->getAllEvent();
	
	$size_event = count($eventInformation);
	$size_actus = count($actusInformation);
	$cpt_event = 0;
	$cpt_actu = 0;
	$key_actus = array_keys($actusInformation);
	$key_event = array_keys($eventInformation);
	
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
?>
<div id="conteneur">
	<div id="selecteur" class="jScrollbar3">
		<ul style="float:left;display:block;">
		<?php
			// On veille à ne pas dépasser la taille des tableaux
			while($cpt_event < $size_event && $cpt_actu < $size_actus) {
				// On test laquelle des dates est la plus récentes des deux tableaux
				if($actusInformation[$key_actus[$cpt_actu]]['date'] < $eventInformation[$key_event[$cpt_event]]['date']){
					$this_actu = $eventInformation[$key_event[$cpt_event]];
					$cpt_event++;
				} else {
					$this_actu = $actusInformation[$key_actus[$cpt_actu]];
					$cpt_actu++;
				}
		?>
			<li>
				<?php echo $this_actu['title']; ?>
			</li>
		<?php
			}
			// On récupère les infos restantes du tableau inachevé
			$rest_array = ($cpt_event == $size_event?$actusInformation:$eventInformation);
			$rest_cpt = ($cpt_event == $size_event?$cpt_actu:$cpt_event);
			$rest_key = ($cpt_event == $size_event?$key_actus:$key_event);
			
			// Et on les affiche à la suite
			while($rest_cpt < count($rest_array)){
		?>
			<li>
				<?php echo $rest_array[$rest_key[$rest_cpt]]['title']; ?>
			</li>
		<?php
				$rest_cpt++;
			}
		?>
		</ul>
	</div>
	
    <div id="article" class="jScrollbar3" style="float:left;margin-left:10px;">
	<div class="jScrollbar_mask">
	    <?php
			$cpt_event = 0;
			$cpt_actu = 0;
			// On veille à ne pas dépasser la taille des tableaux
			while($cpt_event < $size_event && $cpt_actu < $size_actus) {
				// On test laquelle des dates est la plus récentes des deux tableaux
				if($actusInformation[$key_actus[$cpt_actu]]['date'] < $eventInformation[$key_event[$cpt_event]]['date']){
					$this_actu = $eventInformation[$key_event[$cpt_event]];
					$cpt_event++;
				} else {
					$this_actu = $actusInformation[$key_actus[$cpt_actu]];
					$cpt_actu++;
				}
		?>
    	    <article>
			<div class="article_block">
				<div class="titre <?php echo (isset($this_actu['type'])?'event_margin':''); ?>"><?php echo $this_actu['title']; ?></div>
				<div class="content_article">
					<p>
					<?php echo $this_actu['body']; ?>
					</p>
				</div>
			</div>
    	    </article>
		<?php
			}
			// On récupère les infos restantes du tableau inachevé
			$rest_array = ($cpt_event == $size_event?$actusInformation:$eventInformation);
			$rest_cpt = ($cpt_event == $size_event?$cpt_actu:$cpt_event);
			$rest_key = ($cpt_event == $size_event?$key_actus:$key_event);
			
			// Et on les affiche à la suite
			while($rest_cpt < count($rest_array)){
	    ?>
    	    <article>
			<div class="article_block">
				<div class="titre <?php echo (isset($rest_array[$rest_key[$rest_cpt]]['type'])?'event_margin':''); ?>"><?php echo $rest_array[$rest_key[$rest_cpt]]['title']; ?></div>
				<div class="content_article">
					<p>
					<?php echo $rest_array[$rest_key[$rest_cpt]]['body']; ?>
					</p>
				</div>
			</div>
    	    </article>
		<?php
				$rest_cpt++;
			}
		?>
	</div>

	<div class="jScrollbar_draggable">
	    <a href="#" class="draggable"></a>
	</div>

	<div class="clr"></div>
    </div>
</div>