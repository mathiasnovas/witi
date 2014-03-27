<?php

$people = Witi::fetchPeople();
$type   = witi::parseUrl('type');

?>

<ul class="people list row">
    <?php foreach ($people as $person) { ?>
        <li class="col-md-2">
            <a href="?view=person&id=<?php print $person['id']; ?>">
                <?php if ($person['image']) { ?>
                    <figure class="image">
                        <img src="img/thumb/<?php print $person['image']; ?>" alt="">
                    </figure>
                <?php } ?>
            </a>

            <h3 class="title"><?php print $person['name']; ?></h3>

            <?php 
                if (isset($type)) {
                    $gadgets = Witi::fetchGadgetsById($person['id']);
                    if ($gadgets) {
                        foreach ($gadgets as $gadget) {
                            if ($gadget['id'] == $type) {
                                echo 'Markert';
                            }
                        }
                    }
                } else {
                    $gadgets = Witi::fetchGadgetsById($person['id']);
                    if ($gadgets) {
                        foreach ($gadgets as $gadget) {
                            print $gadget['name'];
                        }
                    }
                }
            ?>
        </li>
    <?php } ?>
    <li class="col-md-2 last">
        <button class="add-person-trigger"><i class="glyphicon glyphicon-plus"></i></button>
    </li>
</ul>

<?php require_once 'views/parts/add_person.php'; ?>
