<?php
/**
 * This file is a simple intermediary that passes cuisine and filters data 
 * from the HomeView to the restaurant controller.
 * 
 * @author Taylor,Badesha 
 * Updated: 11/02/2019
 */
require_once'../API/ZomatoAdapter.php';
include 'RestaurantController.php';

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

if  (empty ($cuisineCB)) {
    // redirect to index if no cuisine was selected before the form was submitted
    echo "<form id='invalidForm' action='../index.php' method='post'>
                <input type='hidden' name='noSelection' value='Please select at least one cuisine.' />  
          </form>
          <script type='text/javascript'>
            //auto submit form with JavaScript
            document.getElementById ('invalidForm').submit ();
          </script>";
}

//creating an adapter object to look get filtered results
$forRestaurants = new ZomatoAdapter (new ZomatoApi ());

//*an array of restaurants 
$restaurants = $forRestaurants->getRestaurantsByCIdsAndFilters ($cuisineCB, $distance, $rating);

//creates new instance of restaurant controller and load the view using method from RestaurantController
$myRes = new RestaurantController;
echo $myRes->loadBasicView($restaurants);

