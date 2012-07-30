<?php
define("SERVER_NAME","localhost");
define("DATABASE","lastrope");
define("USER","root");
define("PASSWORD","");
require_once 'class/Session.php';

// création de l'objet de session
$session = new Session();
// Test si la session a déjà été initialisée
if($session->read('langue') === null){
    // En cas de non existance , création de la variable session en FR
    $session->write('langue','fr');
}

try {
    $pdo = new PDO('mysql:dbname=' . DATABASE . ";host=" . SERVER_NAME, USER, PASSWORD);
	$pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}
