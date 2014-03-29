<?php

$people = Witi::fetchPeople('score', 6);

?>

<article class="leaderboard page">
    <div class="top-6 col-lg-12">
        <h1 class="title">Top 6 people</h1>
            
        <ul class="people list">
            <?php foreach ($people as $person) { ?>
                <?php
                $id = $person['id'];
                $rank = Witi::getRank($id);
                ?>
                <li class="col-md-2 col-sm-4 col-xs-6 person" data-score="<?php print $person['score']; ?>">
                    <?php include 'views/parts/person.php'; ?>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="statistics col-lg-12">
        <h1 class="title">Statistics</h1>
        <p>This graph gives an overview of the ranking of the top users.</p>

        <canvas id="myChart" width="1140" height="400"></canvas>
    </div>
</article>
