<?php
/**
 * This file is the model of the event for the cuisine of the day is and constructs a
 * a restaurant table for users to see on the homepage in the sidebar and manages the data for cuisine of the day.
 *
 * @author Badesha
 * Updated: 11/13/2019
 */

class EventModel {

//sets parameters for getrestaurant function.
protected $ratingView = 'Any Rating';
protected $cuisineArray = []; //creates an array that we can store cuisine IDs into.

//traverses through array of data and finds ID of the cuisine.

    public function getEventId($_cuisinePairs,$_cuisineDay) {
        foreach ($_cuisinePairs as $Cuisines){
            $Cuisines = $Cuisines['cuisine'];

            if($Cuisines['cuisine_name'] == $_cuisineDay){
                $cuisineID = ($Cuisines['cuisine_id']);
            }

        }
        return $cuisineID;
    }

    public static function loadEventView($_restaurantArray){
        include 'Views/EventTable.php';
        $view = new EventView();
        $view::loadView($_restaurantArray);
    }

//============================== GETTERS ==============================//
    public function getRatingView() {
        return $this->ratingView;
    }

    public function getCuisineArray(){
        return $this->cuisineArray;
    }

}

