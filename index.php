<?php 
	require_once 'bootstrap.php';
	require_once 'class/Header.php';

	$header = new Header($pdo);
	$headerInformation = $header->getAllHeaderInformation();
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title><?php print $headerInformation['title'] ?></title>
        <?php
			// La page à modifier pour inclure le CSS le JS et les balises meta
            include("page/meta.html");
        ?>
    </head>
    <body>
		<div id="corps">
        <?php
			// La page a modifier pour le header
            include("page/header.html");
			
			// Ici c'est le corp de la page. Il serait préférable de découper chaque partie pour avoir un code souple et modulable
			// Décommenter cette ligne et mettre entre guillemet le chemin relatif de la page à inclure
			include("accueil.php");
			// La page a modifier pour le footer
            include("page/footer.html");
		?>
		</div>
    </body>
</html>