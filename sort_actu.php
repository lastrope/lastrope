<?php
require_once 'bootstrap.php';
require_once 'sort_actu_header.php';
$_SESSION['langue'] = isset($_POST['lang'])?$_POST['lang']:$_SESSION['langue'];
// On veille à ne pas dépasser la taille des tableaux
$cpt_event = 0;
$cpt_actu = 0;
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
    <article>
        <div class="article_block">
    	<div class="titre <?php echo (isset($this_actu['type']) ? 'event_margin' : ''); ?>"><?php echo $this_actu['title']; ?></div>
    	<div class="content_article">
    	    <p>
		    <?php echo nl2br($this_actu['body'] . "\n"); ?>
		    <?php echo "<p class='published'>" . DATE_PUBLISHED . " ", date("d/m/Y " . AT . " H:i:s", $this_actu['date']), "</p>"; ?>
    	    </p>
    	</div>
        </div>
    </article>
    <?php
}
// On récupère les infos restantes du tableau inachevé
$rest_array = ($cpt_event == $size_event ? $actusInformation : $eventInformation);
$rest_cpt = ($cpt_event == $size_event ? $cpt_actu : $cpt_event);
$rest_key = ($cpt_event == $size_event ? $key_actus : $key_event);

// Et on les affiche à la suite
while ($rest_cpt < count($rest_array)) {
    ?>
    <article>
        <div class="article_block">
    	<div class="titre <?php echo (isset($rest_array[$rest_key[$rest_cpt]]['type']) ? 'event_margin' : ''); ?>"><?php echo $rest_array[$rest_key[$rest_cpt]]['title']; ?></div>
    	<div class="content_article">
    	    <p>
		    <?php echo nl2br($rest_array[$rest_key[$rest_cpt]]['body'] . "\n"); ?>
		    <?php echo "<p class='published'>" . DATE_PUBLISHED . " ", date("d/m/Y " . AT . " H:i:s", $rest_array[$rest_key[$rest_cpt]]['date']), "</p>"; ?>
    	    </p>
    	</div>
        </div>
    </article>
    <?php
    $rest_cpt++;
}
?>
  


