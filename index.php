<?php 
require_once 'bin/witi.php'; 

$view = (Witi::parseUrl('view') ? Witi::parseUrl('view') : 'people');
$type = Witi::parseUrl('type');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Witi</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/witi.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include 'views/' . $view . '.php'; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
