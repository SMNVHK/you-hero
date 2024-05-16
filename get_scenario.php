<?php
$json = file_get_contents('scenario.json');
$scenario = json_decode($json, true);

header('Content-Type: application/json');
echo json_encode($scenario);
?>