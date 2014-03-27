<?php

$gadgets = Witi::fetchGadgets();

?>

<ul class="gadgets">
    <?php foreach ($gadgets as $gadget) { ?>
        <li>
            <?php print $gadget['name']; ?>
        </li>
    <?php } ?>
</ul>
