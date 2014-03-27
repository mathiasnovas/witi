<?php

$people = Witi::fetchPeople();
$type   = witi::parseUrl('type');

?>

<ul class="people">
    <?php foreach ($people as $person) { ?>
        <li>
            <?php if ($person['image']) { ?>
                <figure class="image">
                    <img src="img/thumb/<?php print $person['image']; ?>" alt="">
                </figure>
            <?php } ?>

            <?php print $person['name']; ?>
            <br>
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
    <li>
        <button class="add-person-trigger">Add +</button>
    </li>
</ul>

<?php require_once 'views/parts/add_person.php'; ?>
