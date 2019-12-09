<?php

require_once 'Settings/Settings.php';
require_once 'API/RestaurantAdapter.php';
require_once 'Models/EventModel.php';

/**
 * This class is a controller used for the cuisine of the day.
 * and constructs a a restaurant table for users to see on the homepage in the sidebar.
 * @author Badesha, Calvo(small change), Isaac
 * Updated: 11/13/2019
 */
class EventControl {

    private $myevent;
    private $cuisineDay;
    private $adapterObject;

    function __construct($_restaurantAdapter, $_cuisineDay) {
        $this->adapterObject = $_restaurantAdapter;
        $this->cuisineDay = $_cuisineDay;
    }

    function launchEvent() {
        //create object of eventmodel.
        $this->myevent = new EventModel();
        $cuisineArray = $this->myevent->getCuisineArray();
        $ratingView = $this->myevent->getRatingView();

        //grabs data of array of cuisines with ID.
        $CuisinePairs = $this->adapterObject->getCuisineIdPairs();

        //gets the cuisineID from the cuisine of the day
        $cuisineID = $this->myevent->getEventID($CuisinePairs, $this->cuisineDay);

        //pushes CusineID into an array so it can be used as a parameter in the getrestaurant function.
        array_push($cuisineArray, $cuisineID);

        //gets an array of restaurants.
        $restaurants = $this->adapterObject->getRestaurantsByCIdsAndFilters($cuisineArray, $ratingView);
        //slices restaurants so it only shows up to 5 restaurants in sidebar.
        $todaysRestaurants = array_slice($restaurants, 0, 5);
        $this->myevent::loadView($todaysRestaurants);
    }

}
