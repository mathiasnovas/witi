<?php

$people = Witi::fetchPeople();
$type   = witi::parseUrl('type');

?>

<ul class="people list">
    <li class="col-md-2 col-sm-4 col-xs-6 add">
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
        </a>

        <h3 class="title">Add new user</h3>
    </li>        
    <?php foreach ($people as $person) { ?>
        <?php 
            $gadgets = Witi::fetchGadgetsById($person['id']);
            $hasGadget = false;
            $id = $person['id'];
            $rank = Witi::getRank($id);

            if (isset($type)) {
                foreach ($gadgets as $gadget) {
                    if ($gadget['id'] === $type) {
                        $hasGadget = true;
                    }
                }
            }
        ?>
        <li class="col-md-2 col-sm-4 col-xs-6 person <?php ($hasGadget ? print 'has-gadget' : ''); ?>" data-id="<?php print $id ?>">
            <?php include 'views/parts/person.php'; ?>
        </li>
    <?php } ?>
</ul>

<?php require_once 'views/parts/add_person.php'; ?>
