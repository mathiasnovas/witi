<?php

$id = witi::parseUrl('id');
$person = witi::fetchPerson($id);

$gadgets = witi::fetchGadgets($person['id']);

?>

<article class="person">

    <h1><?php print $person['name']; ?></h1>

    <ul class="data">
        <li><?php print $gadget['name']; ?></li>
    </ul>

</article>
