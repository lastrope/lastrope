<?php
require_once 'class/Session.php';
// récupération de la langue voulue
$langue     = isset($_GET['lang'])?$_GET['lang']:'fr';
// création de l'objet de session 

$session    = new Session();
// Stockage de la langue voulue dans la session
$session->write('langue', $langue);
// construction du référent 
$referer = $_SERVER['HTTP_REFERER'];
$return_slashes = explode("/",$referer);

$return = explode("-",$return_slashes[3]);

// Renvoie sur la page d'où le choix de la langue a été demandé
if($return[1] && $return[0] != "details"){
    header('Location: '.$langue.'-'.$return[1]);
}else{
    header('Location: '.$referer);
}
