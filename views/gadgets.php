<?php

$gadgets = Witi::fetchGadgets();

?>

<ul class="gadgets">
    <?php foreach ($gadgets as $gadget) { ?>
        <li>
            <?php print $gadget['name']; ?>
            <br>
            <?php
				$people = Witi::fetchPeopleById($gadget['personId']);
                if ($people) {
                    foreach ($people as $person) {
                        print $person['name'];
                    }
                };
            ?>
        </li>
    <?php } ?>
</ul>
