<?php
	// Le premier argument est l'host de la base de données, le deuxième est le nom d'utilisateur et le troisième le mot de passe
	mysql_connect("localhost","root","") or die("Mauvais identifiant, Connexion impossible");
	// Ici l'argument est le nom de la base de données
	mysql_select_db("portfolio") or die("Erreur de connexion à la base de données");;
	mysql_set_charset('utf8');
?>