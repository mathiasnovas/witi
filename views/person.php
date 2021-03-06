<?php

$id = witi::parseUrl('id');
$person = witi::fetchPerson($id);
$gadgets = witi::fetchGadgetsById($id);
$allGadgets = witi::fetchGadgets();
$reports = witi::getReports($id);
$rank = witi::getRank($id);
$log = witi::getLog($id);

?>

<article class="person full" data-id="<?php print $person['id']; ?>">
    <div class="col-sm-4 col-sm-offset-2 left">
        <?php if ($person['image']) { ?>
            <figure class="image">
                <img src="/storage/large/<?php print $person['image']; ?>" alt="">
            </figure>
        <?php } ?>

        <h1>#<?php print $rank . ' '; print $person['name']; ?></h1>
        <h3 class="points"><?php print $person['score']; ?> pts</h3>
    </div>
    <div class="col-sm-3 col-sm-offset-1">
        <div class="box">
            <h4>In possession of</h4>

            <?php if(count($gadgets) > 0) { ?>
            <ul class="gadget arrow-list">
                <?php foreach ($gadgets as $gadget) { ?>
                    <li>
                        <a href="/gadgets/<?php print $gadget['id']; ?>"><?php print $gadget['name']; ?></a>
                    </li>
                <?php } ?>
            </ul>
            <?php } else { ?>
                <p>Nothing yet...</p>
            <?php } ?>
        </div>
        <div class="box">
            <h4>Assign</h4>

            <form class="">
                <select class="assign">
                    <option value="">Select gadget</option>
                    <?php foreach ($allGadgets as $key => $gadget) { ?>
                        <option value="<?php print $gadget['id'] ?>">
                            <?php print $gadget['name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </form>
        </div>
        <?php if (count($log) > 0) { ?>
            <div class="box">
                <h4>Possession history</h4>

                    <ul class="log arrow-list">
                        <?php foreach ($log as $entry) { ?>
                            <?php
                            $gadget = witi::fetchGadget($entry['gadgetId']);
                            ?>
                            <li title="<?= $gadget['name']; ?>"><?= $entry['date'] ?> - <?= $gadget['name'] ?></li>
                        <?php } ?>
                    </ul>
            </div>
        <?php } ?>
        <div class="box">
            <h4>Report history</h4>

            <?php if (count($reports) > 0) { ?>
                <ul class="reports arrow-list">
                    <?php foreach ($reports as $report) { ?>
                        <li><?php print $report['date']; ?>
                            <?php if ($report['comment']) { ?>
                                <span class="comment"><?php print $report['comment']; ?></span>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p>No reports! :-)</p>
            <?php } ?>

            <?php include 'views/parts/report.php'; ?>
        </div>
    </div>
</article>
