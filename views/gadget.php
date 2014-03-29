<?php

$id = witi::parseUrl('id');
$gadget = witi::fetchGadget($id);
$person = witi::fetchPeopleById($gadget['personId']);

?>

<article class="gadget full" data-id="<?php print $gadget['id']; ?>">
    <div class="col-sm-4 col-sm-offset-2 left">
        <?php if ($gadget['image']) { ?>
            <figure class="image">
                <img src="/storage/large/<?php print $gadget['image']; ?>" alt="">
            </figure>
        <?php } ?>

        <h1><?php print $gadget['name']; ?></h1>
    </div>
    <div class="col-sm-3 col-sm-offset-1">
        <div class="box">
            <h4>Assignee</h4>
            <?php if (count($person) > 0) { ?>
                <a href="/people/<?php print $person[0]['id']; ?>"><?php print $person[0]['name']; ?></a>
            <?php } else { ?>
                <p>No assignee yet...</p>
            <?php } ?>
        </div>
    </div>
</article>
