<?php
define("SERVER_NAME","localhost");
define("DATABASE","lastrope");
define("USER","root");
define("PASSWORD","");

/** Main Connection to Database **/
try {
    $pdo = new PDO('mysql:dbname=' . DATABASE . ";host=" . SERVER_NAME, USER, PASSWORD);
	$pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}
