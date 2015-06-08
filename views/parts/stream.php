<section class="stream col-lg-12">

    <h1>Stream</h1>

    <ul class="stream-list">
        <?php foreach ($stream as $streamItem) { ?>

            <?php
                $person = witi::fetchPerson($streamItem['personId']);
                $gadet = witi::fetchGadget($streamItem['gadgetId']);
            ?>

            <li class="stream-item">
                <figure class="image">
                    <img src="storage/thumb/<?php print $person['image']; ?>" alt="">
                </figure>

                <div class="text">
                    <p><a href="people/<?= $person['id'] ?>"> <?= $person['name'] ?></a> tok <a href="gadgets/<?= $gadget['id'] ?>>"><?= $gadget['name'] ?></a> den <?= $streamItem['date']; ?> og tjente 10 poeng</p>
                </div>
            </li>
        <?php } ?>
    </ul>

</section>
