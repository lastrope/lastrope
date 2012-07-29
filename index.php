<?php 
require_once 'bootstrap.php';
require_once 'class/Header.php';
$header                = new Header($pdo);
$headerInformation     = $header->getAllHeaderInformation($lang);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php print $headerInformation['title'] ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="<?php print $headerInformation['meta_description'] ?>" >
        <meta name="Author" content="Lastrope">
        <meta name="Keywords" content="<?php print $headerInformation['meta_keywords'] ?>">
        <meta name="Language" content="">
        <meta name="Robots" content="All">
        <link rel="stylesheet" href="public/css/reset.css" type="text/css" />
        <script type="text/javascript" src="public/js/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="public/img/favicon.png" />
        <!--[if IE]>
         <link rel="shortcut icon" type="image/x-icon" href="public/img/favico.ico" />
        <![endif]-->
    </head>
    <body>
        
    </body>
</html>
