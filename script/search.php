<?php
require_once '../bootstrap.php';
require_once '../class/Research.php';
$langue = $_SESSION['langue'];
// Récupération des données du formulaire en supprimant les espaces aux extrémités
$what = (isset($_POST['what'])) ? trim($_POST['what']) : null;
$where = (isset($_POST['where'])) ? trim($_POST['where']) : '';
$memoire = array();
$research = new Research($pdo, $langue);
$output = "";
$compteur = 0;
$h3 = '<h3>Résultats pertinents</h3>';
if ($what != null && $where != null) {
    // séparation des tris de sélections
    $what_part = explode(' ', $what);
    $where_parts = explode(' ', $where);
    // Pour chaque mot entré lors de la saisie
    foreach ($what_part as $what_value) {
	// Chaque domaine de recherche
	if (trim($what_value) != '') {
	    foreach ($where_parts as $where_value) {
		// Construction de la requête en fonction du domaine
		switch ($where_value) {
		    case 'a_member':
			$request = "SELECT concat(name,' ',firstname) as title FROM members WHERE (name LIKE '%$what_value%' ";
			$request .= "OR firstname LIKE '%$what_value%' ";
			$request .= "OR influences LIKE '%$what_value%' ";
			$request .= "OR short_desc LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			break;
		    case 'a_sound':break;
		    case 'a_video':break;
		    case 'a_news':
			$request = "SELECT idActus as id , title FROM actus WHERE (title LIKE '%$what_value%' ";
			$request .= "OR body LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			break;
		    case 'a_event':
			$request = "SELECT idEvent as id, title FROM event WHERE (title LIKE '%$what_value%' ";
			$request .= "OR body LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			break;
		    default:;
		}
		// Exécution de la requête
		$return = $research->execute($request);
		if (is_array($return)) {
		    // Construction de la sortie écran des résultats
		    foreach ($return as $result) {
			if (array_search($result['title'], $memoire) === FALSE && $compteur < 10) {
			    if($where_value == 'a_member'){
				$attributes = '';
			    }else{
				$attributes = "onclick=\"load_news_text('".intval($result['id'])."','".addslashes($result['title'])."');\"";
			    }
			    $output .= "<p><a href='#' ".$attributes." >" . $result['title'] . "</a></p>";
			    $compteur++;
			}
			$memoire[] = $result['title'];
		    }
		}
	    }
	}
    }
    
    echo (isset($output) && !empty($output))?$h3.PHP_EOL.$output:$h3.PHP_EOL.'Pas de résultats';

} else {
    echo 'Pas de résultats';
}