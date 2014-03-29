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
            <a href="gadgets/<?php print $gadget['id']; ?>">
                <?php if ($gadget['image']) { ?>
                    <figure class="image">
                        <img src="storage/thumb/<?php print $gadget['image']; ?>" alt="">
                        <?php $people = Witi::fetchPeopleById($gadget['personId']); ?>
                        <?php if ($people) { ?>
                        <div class="people">
                            <div>
                                <ul>
                                    <?php foreach ($people as $person) { ?>
                                        <li><?php print $person['name']; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php }; ?>

                        <?php if (!isset($type)) { ?>
                            <div class="overlay">
                                <div class="overlay-wrap">
                                    <p>View gadget</p>
                                </div>
                            </div>
                        <?php } ?>                        
                    </figure>
                <?php } ?>
                <h3 class="title"><?php print $gadget['name']; ?></h3>
            </a>
        </li>
    <?php } ?>
</ul>

<?php require_once 'views/parts/add_gadget.php'; ?>
