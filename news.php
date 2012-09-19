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
	$cpt = 0;
	$key_actus = array_keys($actusInformation);
	$key_event = array_keys($eventInformation);
	
	$tag_langue = isset($_SESSION['langue'])?$_SESSION['langue']:'fr';
?>

<!-- COLONNE DE GAUCHE -->
<!-- ----------------- -->

<div id="selecteur">
		
	<div id="content_bis">
	    <h3><?php echo BREF; ?></h3>
		<ul>
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
			<li id="news_<?php echo $cpt;?>" onclick="load_news_text('<?php echo (isset($this_actu['idActus'])?$this_actu['idActus']:$this_actu['idEvent']); ?>','<?php echo $this_actu['title']; ?>');">
				<?php echo $this_actu['title']; ?>
			</li>
		<?php
				$cpt++;
			}
			// On récupère les infos restantes du tableau inachevé
			$rest_array = ($cpt_event == $size_event?$actusInformation:$eventInformation);
			$rest_cpt = ($cpt_event == $size_event?$cpt_actu:$cpt_event);
			$rest_key = ($cpt_event == $size_event?$key_actus:$key_event);
			
			// Et on les affiche à la suite
			while($rest_cpt < count($rest_array)){
		?>
			<li id="news_<?php echo $cpt;?>" onclick="load_news_text('<?php echo (isset($rest_array[$rest_key[$rest_cpt]]['idActus'])?$rest_array[$rest_key[$rest_cpt]]['idActus']:$rest_array[$rest_key[$rest_cpt]]['idEvent']); ?>','<?php echo addslashes($rest_array[$rest_key[$rest_cpt]]['title']) ?>');">
				<?php echo $rest_array[$rest_key[$rest_cpt]]['title']; ?>
			</li>
		<?php
				$rest_cpt++;
				$cpt++;
			}
		?>
			<li onclick="load_news_text('0','<?php echo $_SESSION['langue']; ?>');">
				<?php echo ALL_NEWS; ?>
			</li>
		</ul>
	</div>
</div>

<!-- COLONNE DE DROITE -->
<!-- ----------------- -->

<div id="search_form" class="div_to_show">
	<div id="image_back">
	</div>
	
	<div id="content_form" style="overflow:hidden;">
		<h3><?php echo SEARCH_FORM_ADVICE; ?></h3>
		
		<form id="my_news_search" action="#" method="post">
			<label style="display:block;"><?php echo SEARCH_TYPE; ?></label><br/><br/>
			<div id="content_answer" style="display:none;width: 100%;height:170px;">
				<div id="a_sound" class="div_answer"><?php echo A_SOUND; ?></div>
				<div id="a_member" class="div_answer"><?php echo A_MEMBER; ?></div>
				<div id="a_video" class="div_answer"><?php echo A_VIDEO; ?></div>
				<div id="a_news" class="div_answer"><?php echo A_NEWS; ?></div>
				<div id="a_event" class="div_answer"><?php echo AN_EVENT; ?></div>
			</div>
			
			<label style="display:block;"><?php echo ENTER_YOUR_SEARCH; ?></label><br/><br/>
			<input id="search_value_id" type="text" name="search_value" class="input_text_passive" required/>
			
			<input type="hidden" value="" name="type_search" id="type_search" />
			<input type="submit" value="<?php echo SEARCH;?>" class="button" onclick="if(!verif_search())return false;"/>
		</form>
	</div>
</div>

<!-- CONTENU PRINCIPAL -->
<!-- ----------------- -->

<div id="conteneur">
    <div id="article" class="jScrollbar3">
	<div id="article_content" class="jScrollbar_mask">
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
					<?php echo nl2br($this_actu['body']."\n"); ?>
					<?php echo "<p class='published'>".DATE_PUBLISHED." " , date("d/m/Y ".AT." H:i:s",$this_actu['date']) , "</p>"; ?>
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
					<?php echo nl2br($rest_array[$rest_key[$rest_cpt]]['body']."\n"); ?>
					<?php echo "<p class='published'>".DATE_PUBLISHED." " , date("d/m/Y ".AT." H:i:s",$rest_array[$rest_key[$rest_cpt]]['date']) , "</p>"; ?>
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
	<div id="researchPreview"><img src="public/media/image/loader.gif" /></div>
	<div class="clr"></div>
    </div>
</div>