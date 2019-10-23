<?php

$rating = "";
$distance = "";
if (isset($_POST['selectRating'])) {
    $rating = $_POST['selectRating'];
}
if (isset($_POST['selectDistance'])) {
    $distance = $_POST['selectDistance'];
}

$cuisineCB = $_POST['checkboxArray'];
if (empty($cuisineCB)) {
    echo("You didn't select any buildings.");
} else {
    $num = count($cuisineCB);

    echo("You selected $num cuisines: ");
    for ($i = 0; $i < $num; $i++) {
        echo($cuisineCB[$i]);
        if($i<$num-1) {
            echo", ";
        }
    }
}

echo "<br>". 'You Selected ' . $rating . ' and ' . $distance;
