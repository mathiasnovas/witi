<?php

$people = Witi::fetchPeople();

?>

<ul class="people">
    <?php foreach ($people as $person) { ?>
        <li>
            <?php print $person['name']; ?>
        </li>
    <?php } ?>
</ul>
