<?php

$gadgets = Witi::fetchGadgets();

?>

<ul class="gadgets list">
    <?php foreach ($gadgets as $gadget) { ?>
        <li class="col-md-2 col-sm-4 col-xs-6 gadget">
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
                </figure>
            <?php } ?>
            <h3 class="title"><?php print $gadget['name']; ?></h3>
        </li>
    <?php } ?>
    <li class="col-md-2 col-sm-4 col-xs-6 person add">
        <a class="add-gadget-trigger">
            <figure class="image">
                <img src="img/white_bg.jpg" alt="">
            </figure>
            <div class="icon-wrapper">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
        </a>
    </li>
</ul>

<?php require_once 'views/parts/add_gadget.php'; ?>
