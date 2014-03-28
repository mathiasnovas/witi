<?php

$gadgets = Witi::fetchGadgets();

?>

<ul class="gadgets list">
    <li class="col-md-2 col-sm-4 col-xs-6 person add">
        <a class="add-trigger">
            <figure class="image">
                <img src="img/white_bg.jpg" alt="">
            </figure>
            <div class="icon-wrapper">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
        </a>
    </li>
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
                                    <li><a href="/?view=person&id=<?php print $person['id']; ?>"><?php print $person['name']; ?></a></li>
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
</ul>

<?php require_once 'views/parts/add_gadget.php'; ?>
