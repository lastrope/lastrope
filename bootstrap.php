<?php
define("SERVER_NAME","localhost");
define("DATABASE","lastrope");
define("USER","root");
define("PASSWORD","");
require_once 'class/Session.php';
require_once 'script/function.php';

// création de l'objet de session
$session = new Session();
// Test si la session a déjà été initialisée
if($session->read('langue') === null){
    // En cas de non existance , création de la variable session en FR
    $session->write('langue','fr');
}
if($session->read('IE_for_first_time') === null){
    // En cas de non existance , création de la variable session en FR
    $session->write('IE_for_first_time','true');
}
require 'lang/' .$_SESSION['langue']. '.php';

// Récupération du nom de la page
$page = isset($_GET['page'])?$_GET['page']:'home';
// Effacement de la variable de session mail_statement_* en cas de
//  changement de page après envoie d'un message de contact
if($page !=='contact'){
    $session->write('mail_statement_confirm', '');
    $session->write('mail_statement_error', '');
}
// LOADER 
// Pour le faire uniquement au premier chargement de la page d'accueil et sur aucune autre page.
if(!isset($_SESSION['loader'])){
    if($page == 'home' ){
	$session->write('loader','on');
    }
}else{
    if($_SESSION['loader'] == 'on'){
	$session->write('loader','off');
    }
}
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:dbname=' . DATABASE . ";host=" . SERVER_NAME, USER, PASSWORD);
	$pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}
