<?php

require_once'../API/ZomatoAdapter.php';
/**
 * This file is a simple intermediary that passes cuisine and filters data 
 * from the HomeView to the submission controller.
 * 
 * @author Taylor
 */
$rating = "";
$distance = "";
$cuisineCB = null;
if (isset($_POST['selectRating'])) {
    $rating = $_POST['selectRating'];
}
if (isset($_POST['selectDistance'])) {
    $distance = $_POST['selectDistance'];
}
if (isset($_POST['checkboxArray'])) {
    $cuisineCB = $_POST['checkboxArray'];
}
//if (isset($_POST['idValues'])) {
    $ids = array(1,2,3);//$_POST['idValues'];
//}
if (empty($cuisineCB)) {
    // redirect to index if no cuisine was selected before the form was submitted
    echo "<form id='invalidForm' action='../index.php' method='post'>
                <input type='hidden' name='noSelection' value='Please select at least one cuisine.' />  
          </form>
          <script type='text/javascript'>
            //auto submit form with JavaScript
            document.getElementById('invalidForm').submit();
          </script>";
} else {
    $num = count($cuisineCB);

    echo("<b>You selected $num cuisines:</b> ");
    for ($i = 0; $i < $num; $i++) {
        echo($cuisineCB[$i]);
        if ($i < $num - 1) {
            echo", ";
        }
    }
}
$forRestaurants = new ZomatoAdapter(new ZomatoApi());

$restaurants = $forRestaurants->getRestaurantsByCIdsAndFilters($cuisineCB,$distance);

echo "<br><br>" . "<b>You Selected</b> " . $rating . " <b>and</b> " . $distance;

echo "<br><br>". "<b>Restaurants by cuisines & distance (not filtered by ratings yet) :</b> <br><br>";
print_r($restaurants);