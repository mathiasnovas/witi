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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/witi.css">
        <link rel="apple-touch-icon" href="img/bookmark-icon.png" /> 
        <link rel="shortcut icon" href="/img/favicon.ico">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header class="main">
            <?php if (!isset($type)) { ?>
                <a href="/">
                    <h1 class="logo">Witi</h1>
                </a>
            <?php } else { ?>
                <h1 class="logo">Witi</h1>
                <?php }; ?>
        </header>
        
        <div class="container">
            <?php if (!isset($type)) { ?>
                <nav class="row main">
                    <div class="col-sm-6 col-sx-12">
                        <a href="/" class="people-button">
                            <i class="glyphicon glyphicon-user"></i>
                            People
                        </a>
                    </div>
                    <div class="col-sm-6 col-sx-12">
                        <a href="/?view=gadgets" class="gadgets-button">
                            <i class="glyphicon glyphicon-phone"></i>
                            Gadgets
                        </a>
                    </div>
                </nav>
            <?php }; ?>

            <div class="row">
                <?php include 'views/' . $view . '.php'; ?>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/fastclick.js"></script>
        <script src="js/witi.js"></script>
    </body>
</html>
