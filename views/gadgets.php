<?php

$gadgets = Witi::fetchGadgets();

?>

<ul class="gadgets list row">
    <?php foreach ($gadgets as $gadget) { ?>
        <li class="col-md-2 gadget">
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
    <li class="col-md-2 last">
        <button class="add-gadget-trigger"><i class="glyphicon glyphicon-plus"></i></button>
    </li>
</ul>

<?php require_once 'views/parts/add_gadget.php'; ?>
