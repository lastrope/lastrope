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
$h3 = '<h3>' . RELEVANT . '</h3>';
if ($what != null) {
    // séparation des tris de sélections
    $what_part = explode(' ', $what);
    $where_parts = (empty($where))?array('a_member','a_sound','a_video','a_news','a_event'):explode(' ', $where);
    // Pour chaque mot entré lors de la saisie
    foreach ($what_part as $what_value) {
	// Chaque domaine de recherche
	if (trim($what_value) != '') {
	    foreach ($where_parts as $where_value) {
		// Construction de la requête en fonction du domaine
		switch ($where_value) {
		    case 'a_member':
			$request = "SELECT idMembers as id, concat(name,' ',firstname) as title ";
			$request .= "FROM members WHERE (name LIKE '%$what_value%' ";
			$request .= "OR firstname LIKE '%$what_value%' ";
			$request .= "OR influences LIKE '%$what_value%' ";
			$request .= "OR short_desc LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			$attribute_value = 'member';
			break;
		    case 'a_sound':
			$request = "SELECT idSong as id, title FROM song WHERE (title LIKE '%$what_value%' ";
			$request .= "OR description LIKE '%$what_value%' ";
			$request .= "OR filename LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			$attribute_value = 'music';
			break;
		    case 'a_video':
			$request = "SELECT idVideo as id, title FROM video WHERE (title LIKE '%$what_value%' ";
			$request .= "OR description LIKE '%$what_value%' ";
			$request .= "OR url LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			$attribute_value = 'video';
			break;
		    case 'a_news':
			$request = "SELECT idActus as id , title FROM actus WHERE (title LIKE '%$what_value%' ";
			$request .= "OR body LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			$attribute_value = 'news';
			break;
		    case 'a_event':
			$request = "SELECT idEvent as id, title FROM event WHERE (title LIKE '%$what_value%' ";
			$request .= "OR body LIKE '%$what_value%') ";
			$request .= "AND lang='$langue'";
			$attribute_value = 'event';
			break;
		    default:;
		}
		// Exécution de la requête
		$return = $research->execute($request);
		if (is_array($return)) {
		    // Construction de la sortie écran des résultats
		    foreach ($return as $result) {
			// Evite les doublons et on effectue seulement 10 affichages
			if (array_search($result['title'], $memoire) === FALSE && $compteur < 10) {
			    $attributes = "onclick=\"load_news_text('" . intval($result['id']) . "','" . $attribute_value . "');\"";
			    $output .= "<p><a href='#' " . $attributes . " >" . $result['title'] . "</a></p>";
			    $compteur++;
			}
			//tampon
			$memoire[] = $result['title'];
		    }
		}
	    }
	}
    }

    echo (isset($output) && !empty($output)) ? $h3 . PHP_EOL . $output : $h3 . PHP_EOL . NO_RESULTS;
} else {
    echo $h3 . PHP_EOL . NO_RESULTS;
}