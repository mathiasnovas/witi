<a href="gadgets/<?php print $gadget['id']; ?>">
    <?php if ($gadget['image']) { ?>
        <figure class="image">
            <img src="storage/thumb/<?php print $gadget['image']; ?>" alt="">
            <?php $people = Witi::fetchPeopleById($gadget['personId']); ?>
            <?php if ($people) { ?>
            <div class="people">
                <div>
                    <ul>
                        <?php foreach ($people as $person) { ?>
                            <li><?php print $person['name']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php }; ?>

            <?php if (!isset($type)) { ?>
                <div class="overlay">
                    <div class="overlay-wrap">
                        <p>View gadget</p>
                    </div>
                </div>
            <?php } ?>                        
        </figure>
    <?php } ?>
    <h3 class="title"><?php print $gadget['name']; ?></h3>
</a>