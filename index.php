<?php 
require_once 'bin/witi.php'; 

$view = Witi::parseUrl('view');
$type = Witi::parseUrl('type');
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Witi</title>
    </head>
    <body>
        <?php include 'views/' . $view . '.php'; ?>
    </body>
</html>
