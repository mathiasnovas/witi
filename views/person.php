<?php

$id = witi::parseUrl('id');
$person = witi::fetchPerson($id);
$gadgets = witi::fetchGadgetsById($id);

?>

<article class="person">
    <h1><?php print $person['name']; ?></h1>

    <ul class="gadgets">
        <?php foreach ($gadgets as $gadget) { ?>
            <li><?php print $gadget['name']; ?></li>
        <?php } ?>
    </ul>
</article>
