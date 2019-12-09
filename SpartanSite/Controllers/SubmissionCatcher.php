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
require_once '../Models/NewUserSearch.php';

$rating = "";
$cuisineCB = null;
$color = "";


if (isset($_POST['selectRating'])) {

    $rating = $_POST['selectRating'];
}

if (isset($_POST['checkboxArray'])) {

    $cuisineCB = $_POST['checkboxArray'];
}


if (isset($_POST['selectRating'])) {
    $rating = $_POST['selectRating'];
    $color = "";
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

$adapterObject = new RestaurantAdapter(new ZomatoAPI());


//*an array of restaurants
$restaurants = $adapterObject->getRestaurantsByCIdsAndFilters($cuisineCB, $rating);

//creates new instance of restaurant controller and load the view using method from RestaurantController
$myRes = new RestaurantController;
echo $myRes->loadBasicView($restaurants,$color);

//Creates a New User Search object with the selected color. Saves to database.
$object = new NewUserSearch($color);
$object->save();

