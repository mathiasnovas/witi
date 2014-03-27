<?php

$people = Witi::fetchPeople();
$type   = witi::parseUrl('type');

?>

<ul class="people">
    <?php foreach ($people as $person) { ?>
        <li>
            <?php print $person['name']; ?>
            <br>
            <?php 
                if (isset($type)) {
                    $gadgets = Witi::fetchGadgetById($person['id']);
                    if ($gadgets) {
                        foreach ($gadgets as $gadget) {
                            if ($gadget['id'] == $type) {
                                echo 'Markert';
                            }
                        }
                    }
                } else {
                    $gadgets = Witi::fetchGadgetById($person['id']);
                    if ($gadgets) {
                        foreach ($gadgets as $gadget) {
                            print $gadget['name'];
                        }
                    }
                }
            ?>
        </li>
    <?php } ?>
</ul>
