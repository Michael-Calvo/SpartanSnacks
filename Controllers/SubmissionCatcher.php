<?php

/**
 * This file is a simple intermediary that passes cuisine and filters data
 * from the HomeView to the restaurant controller.
 *
 * @author Taylor,Badesha
 * Updated: 12/3/2019
 */

require_once '../API/RestaurantAdapter.php';
require_once 'RestaurantController.php';

$rating = "";
$cuisineCB = null;
$color = "";
$ipAddress = "123";


if (isset($_POST['selectRating'])) {

    $rating = $_POST['selectRating'];
}

if (isset($_POST['checkboxArray'])) {

    $cuisineCB = $_POST['checkboxArray'];
}


if (isset($_POST['selectRating'])) {
    $rating = $_POST['selectRating'];
    $color = "";
    $ipAddress = "123";
}

if (isset($_POST['checkboxArray'])) {

    $cuisineCB = $_POST['checkboxArray'];
}

if (isset($_POST['selectedColor'])) {

    $color = $_POST['selectedColor'];
}



if (empty($cuisineCB)) {
// redirect to index if no cuisine was selected before the form was submitted
    echo "<form id='invalidForm' action='../index.php' method='post'>
                <input type='hidden' name='noSelection' value='Please select at least one cuisine.' />
          </form>
          <script type='text/javascript'>
            //auto submit form with JavaScript
            document.getElementById ('invalidForm').submit ();
          </script>";
}



//*an array of restaurants
$restaurants = $adapterObject->getRestaurantsByCIdsAndFilters($cuisineCB, $rating);

//creates new instance of restaurant controller and load the view using method from RestaurantController
$myRes = new RestaurantController;
echo $myRes->loadBasicView($restaurants,$color);

$myRes->invoke($ipAddress, $color);

