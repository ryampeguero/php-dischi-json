<?php
$disk_list = file_get_contents("dischi.json");
$disk_decoded = json_decode($disk_list, true);

header("Content-type: application/json");


$results = json_encode($disk_decoded);
//Invio risposta
echo $results;