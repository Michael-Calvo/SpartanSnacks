<?php
/**
 * This file determines what the cuisine of the day is and constructs a
 * a restaurant table for users to see on the homepage in the sidebar. 
 * 
 * @author Badesha, Calvo(small change)
 * Updated: 11/13/2019
 */
require_once 'API/ZomatoAdapter.php';
include 'Controllers/RestaurantController.php';
const timezone = 'EST';

//sets timezone to EST.
date_default_timezone_set(timezone);

//sets parameters for getrestaurant function.
$DistanceView = 'Any Distance';
$RatingView = 'Any Rating';  
$CuisineArray = array(); //creates an array that we can store cuisine IDs into.
 
//creates an array with cuisine names as keys to each day of the week.
$days_array = array( "Sunday" => 'Southern',"Monday" => 'Seafood', "Tuesday" => 'Mexican',
    "Wednesday" => 'Greek', "Thursday" => 'Japanese', "Friday" => 'Burger', "Saturday" => 'Italian');

//sets the cuisine of the day depending on what day it is. date("l") returns a day(Monday). 
$cuisineday = $days_array[date("l")];

//creating an adapter object to look get filtered results.
$forRestaurants = new ZomatoAdapter (new ZomatoApi ());
$forCuisines = new ZomatoAdapter(new ZomatoApi());

//grabs data of array of cuisines with ID. 
$CuisinePairs = $forCuisines->getCuisineIdPairs();

echo "Cuisine of the Day: " , $cuisineday;

//traverses through array of data and finds ID of the cuisine. 
foreach ($CuisinePairs as $Cuisines){
    $Cuisines = $Cuisines['cuisine'];

        if($Cuisines['cuisine_name'] == $cuisineday){
        $CuisineID = ($Cuisines['cuisine_id']);
        }
        
    }
//pushes CusineID into an array so it can be used as a parameter in the getrestaurant function.     
array_push($CuisineArray, $CuisineID);    

//gets an array of restaurants. 
$restaurants = $forRestaurants->getRestaurantsByCIdsAndFilters ($CuisineArray, $DistanceView, $RatingView);
//slices restaurants so it only shows up to 5 restaurants in sidebar.
$Event_restaurants = array_slice($restaurants, 0, 5);

//creates new instance of restaurant controller and load the view using method from RestaurantController
$myevent = new RestaurantController;
echo $myevent->loadEventView($Event_restaurants);
