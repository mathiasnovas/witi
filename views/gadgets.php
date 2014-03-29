<?php

$gadgets = Witi::fetchGadgets();

?>

<ul class="gadgets list">
    <li class="col-md-2 col-sm-4 col-xs-6 person add">
        <a class="add-trigger">
            <figure class="image">
                <img src="img/white_bg.jpg" alt="">
                <div class="overlay">
                    <div class="overlay-wrap">
                    </div>
                </div>
            </figure>
            <div class="icon-wrapper">
                <i class="glyphicon glyphicon-plus"></i>
            </div>

            <h3 class="title">Add new gadget</h3>
        </a>
    </li>
    <?php foreach ($gadgets as $gadget) { ?>
        <li class="col-md-2 col-sm-4 col-xs-6 gadget">
            <?php include 'views/parts/gadget.php'; ?>
        </li>
    <?php } ?>
</ul>

<?php require_once 'views/parts/add_gadget.php'; ?>
