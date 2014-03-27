<?php

$people = Witi::fetchPeople();

?>

<ul class="people">
    <?php foreach ($people as $person) { ?>
        <li>
            <?php print $person['name']; ?>
            <br>
            <?php 
                $gadgets = Witi::fetchGadgetById($person['id']);
                if ($gadgets) {
                    foreach ($gadgets as $gadget) {
                        //var_dump($value);
                        print $gadget['name'];
                    }
                }
            ?>
        </li>
    <?php } ?>
</ul>
