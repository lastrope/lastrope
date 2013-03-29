<?php
header('Content-type: application/rss+xml; charset=UTF-8;');
require_once 'bootstrap.php';
require_once 'class/Header.php';
require_once 'sort_actu_header.php';

$header = new Header($pdo, $session->read('langue'));
$headerInformation = $header->getAllHeaderInformation();

print '<?xml version="1.0" encoding="iso-8859-1" ?>';
?>
<rss version="2.0">
<channel>
    <title><![CDATA[<?php print htmlspecialchars($headerInformation['title']) ?>]]></title>
    <link><![CDATA[http://www.passanger.fr]]></link>
    <description><![CDATA[<?php print htmlspecialchars($headerInformation['meta_description']) ?>]]></description>
 <?php   // On veille à ne pas dépasser la taille des tableaux
    $cpt_event = 0;
    $cpt_actu = 0;
    while ($cpt_event < $size_event && $cpt_actu < $size_actus) {	
	// On test laquelle des dates est la plus récentes des deux tableaux
	if ($actusInformation[$key_actus[$cpt_actu]]['date'] < $eventInformation[$key_event[$cpt_event]]['date']) {

	    $this_actu = $eventInformation[$key_event[$cpt_event]];
	    $cpt_event++;
	    $temoin = "event";
	    $id =  $eventInformation[$key_event[$cpt_event]]['idActus'];
	} else {
	    $this_actu = $actusInformation[$key_actus[$cpt_actu]];
	    $cpt_actu++;
	    $temoin = "news";
	    $id =  $eventInformation[$key_event[$cpt_event]]['idEvent'];
	}
    
    ?>
    <item>
	<title><![CDATA[<?php echo htmlspecialchars($this_actu['title']); ?>]]></title>
	<description><![CDATA[<?php echo htmlspecialchars($this_actu['body']); ?>]]></description>
	<link><![CDATA[http://www.passanger.fr/details-<?php echo $temoin.'-'.$id?>]]></link>
    </item>
    <?php
    }
    // On récupère les infos restantes du tableau inachevé
    $rest_array = ($cpt_event == $size_event ? $actusInformation : $eventInformation);
    $rest_cpt = ($cpt_event == $size_event ? $cpt_actu : $cpt_event);
    $rest_key = ($cpt_event == $size_event ? $key_actus : $key_event);

    // Et on les affiche à la suite
    while ($rest_cpt < count($rest_array)) {
	?>
    <item>
	<title><![CDATA[<?php echo htmlspecialchars($rest_array[$rest_key[$rest_cpt]]['title']); ?>]]></title>
	<description><![CDATA[<?php echo htmlspecialchars($rest_array[$rest_key[$rest_cpt]]['body']) ?>]]></description>
	<link><![CDATA[ http://www.passanger.fr/details-<?php echo isset($rest_array[$rest_key[$rest_cpt]]['idActus'])? "news-".$rest_array[$rest_key[$rest_cpt]]['idActus'] : "event-".$rest_array[$rest_key[$rest_cpt]]['idEvent']; ?> ]]></link>
    </item>
      <?php
    $rest_cpt++;
}
?>
</channel>
</rss>

