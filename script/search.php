<?php
require_once '../bootstrap.php';
require_once '../class/Research.php';
$langue = $_SESSION['langue'];
// Récupération des données du formulaire en supprimant les espaces aux extrémités
$what = (isset($_POST['what']))?trim($_POST['what']):null;
$where = (isset($_POST['where']))?trim($_POST['where']):null;

$research = new Research($pdo,$langue);
$output = "";
$what_part = explode(' ',$what);
if($what != null && $where != null){
    // séparation des tris de sélections
    $where_parts = explode(' ',$where);
    
    foreach($where_parts as $value){
	switch($value){
	    case 'a_member':
		$request = "SELECT name, firstname FROM members WHERE (name LIKE '%$what%' ";
		$request .= "OR firstname LIKE '%$what%' ";
		$request .= "OR influences LIKE '%$what%' ";
		$request .= "OR short_desc LIKE '%$what%') ";
		$request .= "AND lang='$langue'";
		break;
	    case 'a_sound':break;
	    case 'a_video':break;
	    case 'a_news':
		$request = "SELECT title FROM actus WHERE (title LIKE '%$what%' ";
		$request .= "OR body LIKE '%$what%') ";
		$request .= "AND lang='$langue'";
		break;
	    case 'a_event':
		$request = "SELECT title FROM event WHERE (title LIKE '%$what%' ";
		$request .= "OR body LIKE '%$what%') ";
		$request .= "AND lang='$langue'";
		break;
	    default:;
	}
	
	$output .= '<p>';
	$return = $research->execute($request);
	if(is_array($return)){
	    foreach($return as $result){
		$output .= $result.' ';
	    }
	}
	$output .= '</p>';
    }
    echo $output;
}else{
    echo 'no';
}