<?php
require_once 'class/Session.php';
// récupération de la langue voulue
$langue     = isset($_GET['lang'])?$_GET['lang']:'fr';
// création de l'objet de session 
$session    = new Session();
// Stockage de la langue voulue dans la session
$session->write('langue', $langue);
// Renvoie sur la page d'où le choix de la langue a été demandé
header('Location: '.$_SERVER['HTTP_REFERER']);

