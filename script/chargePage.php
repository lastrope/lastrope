<?php
	// Un script assez utile pour du chargement de page par AJAX
    $page = $_POST['value'];
    include("../$page.php");
?>