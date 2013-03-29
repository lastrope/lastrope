<?php
require_once 'class/Actus.php';
require_once 'class/Event.php';

require_once 'sort_actu_header.php';
?>

<!-- COLONNE DE GAUCHE -->
<!-- ----------------- -->

<div id="selecteur">

    <div id="content_bis">
	<h3><?php echo IN_FEW_WORDS . BEFORE_TWO_POINT; ?>:</h3>
	<ul>
	    <?php
	    // On veille à ne pas dépasser la taille des tableaux
	    while ($cpt_event < $size_event && $cpt_actu < $size_actus) {
		// On test laquelle des dates est la plus récentes des deux tableaux
		if ($actusInformation[$key_actus[$cpt_actu]]['date'] < $eventInformation[$key_event[$cpt_event]]['date']) {
		    $this_actu = $eventInformation[$key_event[$cpt_event]];
		    $cpt_event++;
		} else {
		    $this_actu = $actusInformation[$key_actus[$cpt_actu]];
		    $cpt_actu++;
		}
		?>
    	    <li id="news_<?php echo $cpt; ?>" >
		   <a href="details-<?php echo (isset($this_actu['idActus']))?'news-'.$this_actu['idActus']  : "event-".$this_actu['idEvent']; ?>" ><?php echo $this_actu['title']; ?></a>
    	    </li>
		<?php
		$cpt++;
	    }
	    // On récupère les infos restantes du tableau inachevé
	    $rest_array = ($cpt_event == $size_event ? $actusInformation : $eventInformation);
	    $rest_cpt = ($cpt_event == $size_event ? $cpt_actu : $cpt_event);
	    $rest_key = ($cpt_event == $size_event ? $key_actus : $key_event);

	    // Et on les affiche à la suite
	    while ($rest_cpt < count($rest_array)) {
		?>
    	    <li id="news_<?php echo $cpt; ?>">
		    <a href="details-<?php echo (isset($rest_array[$rest_key[$rest_cpt]]['idActus']) ? "news-".$rest_array[$rest_key[$rest_cpt]]['idActus']  : "event-".$rest_array[$rest_key[$rest_cpt]]['idEvent']); ?>"><?php echo $rest_array[$rest_key[$rest_cpt]]['title']; ?></a>
    	    </li>
		<?php
		$rest_cpt++;
		$cpt++;
	    }
	    ?>
	    <li onclick="sort_actu();">
		<?php echo ALL_NEWS; ?>
	    </li>
	</ul>
    </div>
     <div id="content_form" style="overflow:hidden;display:none">
	<h3><?php echo SEARCH_FORM_ADVICE; ?></h3>

	<div id="my_news_search" >
	    <label style="display:block;"><?php echo SEARCH_TYPE; ?></label><br/>
	    <div id="content_answer" >
		<div id="a_sound" class="div_answer"><?php echo A_SOUND; ?></div>
		<div id="a_member" class="div_answer"><?php echo A_MEMBER; ?></div>
		<div id="a_video" class="div_answer"><?php echo A_VIDEO; ?></div>
		<div id="a_news" class="div_answer"><?php echo A_NEWS; ?></div>
		<div id="a_event" class="div_answer"><?php echo AN_EVENT; ?></div>
		
		<div class="clear"></div>
	    </div>

	    <label style="display:block;margin-bottom:10px;"><?php echo ENTER_YOUR_SEARCH; ?></label>
	    <input id="search_value_id" type="text" name="search_value" class="input_text_passive" required/>

	    <input type="hidden" value="" name="type_search" id="type_search" />
	   
	    <button class="button" id="form_search_action" onclick="if(!verif_search())return false;"> <?php echo SEARCH; ?> </button>
	</div>
    </div>
</div>
<!-- CONTENU PRINCIPAL -->
<!-- ----------------- -->

<div id="conteneur-news">

    <div id="article" class="jScrollbar3 news-content content-responsive">
	<div id="article_content" class="jScrollbar_mask">
	    <?php include 'sort_actu.php'; ?>
	</div>
	<div class="clear"></div>

    </div>
    <div class="clearr"></div>
</div>
<div class="clear"></div>