<?php

require_once 'witi.php';

$type = (isset($_POST['type']) ? $_POST['type'] : '');
$id = $_POST['id'];
$gadgetId = (isset($_POST['gadgetId']) ? $_POST['gadgetId'] : false );
$date = (isset($_POST['date']) ? $_POST['date'] : false );
$comment = (isset($_POST['comment']) ? $_POST['comment'] : false);

if ($type === 'report') {
    Witi::setReport($id, $comment);
} else {
    Witi::updatePerson($id, $gadgetId);
}
