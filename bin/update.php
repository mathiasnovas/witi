<?php

require_once 'witi.php';

$id = $_POST['id'];
$gadgetId = $_POST['gadgetId'];

Witi::updatePerson($id, $gadgetId);
