<?php 
	require_once 'bootstrap.php';        
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>Attention !</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta name="Author" content="PASSANGER">
		<meta NAME="Identifier-URL" CONTENT="">
		<meta NAME="Date-Creation-yyyymmdd" content="20120726">
		<meta name="Date-Revision-yyyymmdd" content="20120726">
		<meta NAME="Reply-to" CONTENT="">
		<meta NAME="revisit-after" CONTENT="15 days">
		<meta NAME="Category" CONTENT="Internet">
		<meta NAME="Publisher" CONTENT="Thibault DULON">
		<meta NAME="Copyright" CONTENT="Thibault DULON">
		<meta NAME="Generator" CONTENT="PHP Engineer, HTML5/CSS3 Integrator">
		<meta NAME="robots" CONTENT="index, follow, all">
		<meta name="Rating" content="general">
		<meta name="Distribution" content="global">
		<meta name="Geography" content="Paris, France, 75010">
		
		<!-- REQUIRED CSS -->
		<link rel="stylesheet" href="public/css/style.css" media="screen" type="text/css">
    </head>
    <body>
		<div id="global">
			<div style="width: 205px;height:50px;margin:auto;font-family: Helvetica;font-size: 40px;color:#7F554E;font-weight:bold;">
				Passanger
			</div>
			<div id="warning" style="margin-top:100px;">
				<div class="transp">
					<?php
						echo BAD_BROWSER . '<br/>';
						echo ADVICE_BROWSER . '<br/>';
						echo CHECK_OTHER_BROWSER . '<br/>';
						echo SEE_WEBSITE_WITH_IE . '<br/>';
					?>
					<div id="language" style="float:none;margin:20px 0 20px 0;">
						<a href="set_language.php?lang=en" title="English Version">
							<img src="public/media/image/flag_en.png" />
						</a>
						<a href="set_language.php?lang=fr" title="Version Française">
							<img src="public/media/image/flag_fr.png" />
						</a>
					</div>
				</div>
			</div>
        </div>
    </body>
</html>