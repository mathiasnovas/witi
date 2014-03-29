<a href="people/<?php print $id ?>">
    <?php if ($person['image']) { ?>
        <figure class="image">
            <img src="storage/thumb/<?php print $person['image']; ?>" alt="">
            <?php if (!isset($type) && isset($gadgets) && $gadgets) { ?>
                <div class="gadgets">
                    <div>
                        <ul>
                            <?php foreach ($gadgets as $gadget) { ?>
                                <li><?php print $gadget['name']; ?></li>     
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

            <?php if (!isset($type)) { ?>
                <div class="overlay">
                    <div class="overlay-wrap">
                        <p>View profile</p>
                    </div>
                </div>
            <?php } ?>
        </figure>
    <?php } ?>


    <h3 class="title">#<?php print $rank . ' '; print $person['name']; ?></h3>
</a>