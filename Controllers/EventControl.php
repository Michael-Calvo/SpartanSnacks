<?php
/**
 * This file determines what the cuisine of the day is and constructs a
 * a restaurant table for users to see on the homepage in the sidebar.
 *
 * @author Badesha, Calvo(small change)
 * Updated: 11/13/2019
 */
require_once 'API/RestaurantAdapter.php';
require_once 'Settings/Settings.php';
require_once 'Models/EventModel.php';

//create object of eventmodel.
$myevent = new EventModel();
$cuisineArray = $myevent->getCuisineArray();
$ratingView = $myevent->getRatingView();

//grabs data of array of cuisines with ID.
$CuisinePairs = $adapterObject->getCuisineIdPairs();

//gets the cuisineID from the cuisine of the day
$cuisineID = $myevent->getEventID($CuisinePairs,$cuisineDay);

//pushes CusineID into an array so it can be used as a parameter in the getrestaurant function.
array_push($cuisineArray, $cuisineID);

//gets an array of restaurants.
$restaurants = $adapterObject->getRestaurantsByCIdsAndFilters ($cuisineArray, $ratingView);
//slices restaurants so it only shows up to 5 restaurants in sidebar.
$Event_restaurants = array_slice($restaurants, 0, 5);
