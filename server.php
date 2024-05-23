<?php
$disk_list = file_get_contents("dischi.json");
$disk_decoded = [
    "results" => json_decode($disk_list, true),
    "success" => true
];

header("Content-type: application/json");


$results = json_encode($disk_decoded);
//Invio risposta
echo $results;