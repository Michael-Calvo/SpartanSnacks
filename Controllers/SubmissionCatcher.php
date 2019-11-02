<?php

require_once'../API/ZomatoAdapter.php';
/**
 * This file is a simple intermediary that passes cuisine and filters data 
 * from the HomeView to the submission controller.
 * 
 * @author Taylor 
 * Updated: 11/02/2019
 */
$rating = "";
$distance = "";
$cuisineCB = null;
if  (isset ($_POST['selectRating'])) {
    $rating = $_POST['selectRating'];
}
if  (isset ($_POST['selectDistance'])) {
    $distance = $_POST['selectDistance'];
}
if  (isset ($_POST['checkboxArray'])) {
    $cuisineCB = $_POST['checkboxArray'];
}

//creates restaurant controller
//$controller = new RestaurantController ($rating, $distance, $cuisineCB);

if  (empty ($cuisineCB)) {
    // redirect to index if no cuisine was selected before the form was submitted
    echo "<form id='invalidForm' action='../index.php' method='post'>
                <input type='hidden' name='noSelection' value='Please select at least one cuisine.' />  
          </form>
          <script type='text/javascript'>
            //auto submit form with JavaScript
            document.getElementById ('invalidForm').submit ();
          </script>";
} else {
    $num = count ($cuisineCB);

    echo ("<b>You selected $num cuisines:</b> ");
    for  ($i = 0; $i < $num; $i++) {
        echo ($cuisineCB[$i]);
        if  ($i < $num - 1) {
            echo", ";
        }
    }
}
$forRestaurants = new ZomatoAdapter (new ZomatoApi ());

$restaurants = $forRestaurants->getRestaurantsByCIdsAndFilters ($cuisineCB, $distance, $rating);

echo "<br><br>" . "<b>You Selected</b> " . $rating . " <b>and</b> " . $distance;

echo "<br><br>" . "<b>Restaurants by cuisines, distance, and ratings - " . count ($restaurants) . " result (s):</b> <br><br>";
print_r ($restaurants);
