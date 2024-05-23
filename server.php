<?php
$disk_string = file_get_contents("dischi.json");
$disk_array = json_decode($disk_string, true);


if (isset($_GET["title_like"])) {

    $title_liked = $_GET["title_like"];

    foreach ($disk_array as $index => $disk) {

        if (in_array($title_liked, $disk) && $disk_array[$index]["like"] == false) {

            $disk_array[$index]["like"] = true;
            $json_object = json_encode($disk_array);
            file_put_contents("dischi.json", $json_object);
            $old_index = $index;
            break;
        }
        
        if ($title_liked == $disk_array[$index]["title"] && $disk_array[$index]["like"] == true) {
            // echo "sono qua".$index;
            $disk_array[$index]["like"] = false;
            $json_object = json_encode($disk_array);
            file_put_contents("dischi.json", $json_object);
            break;
        }
    }
    // var_dump($disk_array);

    header("Location: ./index.php");
}

// var_dump($_GET);
if (isset($_GET["filter"])) {
    // var_dump($_GET);
    $temp_array = [];
    foreach ($disk_array as $index => $disk) {
        if ($disk["like"] == true) {
            $temp_array[] = $disk_array[$index];

            $json_object = json_encode($temp_array);
        }
    }

    header("Content-type: application/json");

    $disk_decoded = [
        "results" => $temp_array,
        "success" => true
    ];

    $prova = json_encode($disk_decoded);
    // Invio risposta
    echo $prova; 
} else {
    header("Content-type: application/json");

    $disk_decoded = [
        "results" => $disk_array,
        "success" => true
    ];

    $results = json_encode($disk_decoded);
    // Invio risposta
    echo $results;
}
