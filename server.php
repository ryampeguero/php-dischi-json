<?php
$disk_string = file_get_contents("dischi.json");
$disk_array = json_decode($disk_string, true);


if (isset($_GET["like"])) {

    $is_liked = $_GET["like"];
    // echo "ciao" . $is_liked;

    foreach ($disk_array as $index => $disk) {
        if (in_array($is_liked, $disk)) {
            // echo "ciao!!!";
            $disk_array[$index]["like"] = true;
            $json_object = json_encode($disk_array);
            file_put_contents("dischi.json", $json_object);
        }
        
    }
    // var_dump($disk_array);
        
    header("Location: ./index.php");
}

header("Content-type: application/json");

$disk_decoded = [
    "results" => $disk_array,
    "success" => true
];

$results = json_encode($disk_decoded);
// Invio risposta
echo $results;