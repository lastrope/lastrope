<?php

require_once '../bootstrap.php';
require_once '../class/Research.php';
$langue = $_SESSION['langue'];
// Récupération des données du formulaire en supprimant les espaces aux extrémités
$what = (isset($_POST['what'])) ? trim($_POST['what']) : null;
$where = (isset($_POST['where'])) ? trim($_POST['where']) : null;

$research = new Research($pdo, $langue);
$output = "";
$output .= '<h3>Résultats pertinents</h3>';
if ($what != null && $where != null) {
    // séparation des tris de sélections
    $what_part = explode(' ', $what);
    $where_parts = explode(' ', $where);
    foreach ($what_part as $what_value) {
	foreach ($where_parts as $where_value) {
	    switch ($where_value) {
		case 'a_member':
		    $request = "SELECT name, firstname FROM members WHERE (name LIKE '%$what_value%' ";
		    $request .= "OR firstname LIKE '%$what_value%' ";
		    $request .= "OR influences LIKE '%$what_value%' ";
		    $request .= "OR short_desc LIKE '%$what_value%') ";
		    $request .= "AND lang='$langue'";
		    break;
		case 'a_sound':break;
		case 'a_video':break;
		case 'a_news':
		    $request = "SELECT title FROM actus WHERE (title LIKE '%$what_value%' ";
		    $request .= "OR body LIKE '%$what_value%') ";
		    $request .= "AND lang='$langue'";
		    break;
		case 'a_event':
		    $request = "SELECT title FROM event WHERE (title LIKE '%$what_value%' ";
		    $request .= "OR body LIKE '%$what_value%') ";
		    $request .= "AND lang='$langue'";
		    break;
		default:;
	    }
	    
	    $return = $research->execute($request);
	    if (is_array($return)) {
		$output .= '<p>';
		foreach ($return as $result) {
		    $output .= $result . ' ';
		}
		$output .= '</p>';
	    }
	    
	}
    }
    echo $output;
} else {
    echo 'Pas de résultats';
}