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
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
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
        <header class="main">
            <h1 class="logo">Witi</h1>
        </header>
        
        <div class="container">
            
            <nav class="row main">
                <div class="col-lg-6">
                    <a href="#" class="people-button">
                        <i class="glyphicon glyphicon-user"></i>
                        People
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="#" class="gadgets-button">
                        <i class="glyphicon glyphicon-phone"></i>
                        Gadgets
                    </a>
                </div>
            </nav>

            <div class="row">
                <?php include 'views/' . $view . '.php'; ?>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/witi.js"></script>
    </body>
</html>
