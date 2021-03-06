<?php 
	require_once 'bootstrap.php';
	require_once 'class/Header.php';
        
	$header = new Header($pdo, $session->read('langue'));
	$headerInformation = $header->getAllHeaderInformation();

	if(preg_match("/MSIE/", $useragent) === 1 && $_SESSION['IE_for_first_time']){
		header("location: index_ie.php");
		$_SESSION['IE_for_first_time'] = false;
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
	<title><?php print $headerInformation['title'] ?></title>
        <?php
	    // La page à modifier pour inclure le CSS le JS et les balises meta
            include("page/meta.phtml");
        ?>
    </head>
    <body>
	<?php 
	    // Animation juste pour le mobile et seulement après le chargement de la page
	    if(isset($_SESSION['loader']) && $_SESSION['loader'] != 'off') {
		if( !$is_on_mobile ) {
		    echo '  <script>
				$(document).ready(function(){
				    loader();
				});
			    </script>';
		}
	    }
	?>
	<div id="global">
	    <?php
		if(isset($_SESSION['loader']) && $_SESSION['loader'] == 'on' && !$is_on_mobile){
	    ?>	
		    <div id="top_loader"></div>
		    <div id="logo_loader"></div>
		    <div id="bottom_loader"></div>	
	    <?php
		}
	    ?>
	    <div id="corps">
		<?php
		    // La page a modifier pour le header
		    include("page/header.phtml");
		    if( $is_on_mobile )
			echo '<div id="content-starting"></div>';
		    // Ici c'est le corp de la page. Il serait préférable de découper chaque partie pour avoir un code souple et modulable
		    // Décommenter cette ligne et mettre entre guillemet le chemin relatif de la page à inclure
		    include($page.".php");
		?>
	    </div>
	    <?php
		// La page a modifier pour le footer
		include("page/footer.phtml");

		if($_SERVER['REQUEST_URI'] == '/fr-contact' || $_SERVER['REQUEST_URI'] == '/en-contact'){
	    ?>
		    <script type="text/javascript" src="public/js/formulaire.js"></script>
	    <?php
		}
	    ?>
	</div>
    </body>
</html>