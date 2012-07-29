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
			// La page � modifier pour inclure le CSS le JS et les balises meta
            include("page/meta.html");
        ?>
    </head>
    <body>
		<div id="corps">
        <?php
			// La page a modifier pour le header
            include("page/header.html");
			
			// Ici c'est le corp de la page. Il serait pr�f�rable de d�couper chaque partie pour avoir un code souple et modulable
			// D�commenter cette ligne et mettre entre guillemet le chemin relatif de la page � inclure
			include("accueil.php");
			// La page a modifier pour le footer
            include("page/footer.html");
		?>
		</div>
    </body>
</html>