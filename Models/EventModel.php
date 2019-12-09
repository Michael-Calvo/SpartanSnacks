<?php
/**
 * This file is the model of the event for the cuisine of the day is and constructs a
 * a restaurant table for users to see on the homepage in the sidebar and manages the data for cuisine of the day.
 *
 * @author Badesha
 * Updated: 12/8/2019
 */

class EventModel {

//sets parameters for getrestaurant function.
protected $ratingView = 'Any Rating';
protected $cuisineArray = []; //creates an array that we can store cuisine IDs into.
const DEFAULT_VALUE = "No Info";

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

        //loads view of event table.
    public function loadView ($_restaurantArray) {
        self::createEventTable ($_restaurantArray);

    }

    //creates a table of restaurant name and link to their website.
    private function createEventTable ($_restaurantArray) {
        echo "<table id='restaurantTable'>";

        echo"<tr class='header'><th style='width:25%;'>Restaurant</th><th style='width:25%;'>Info</th>";
        foreach ($_restaurantArray as $_restaurant) {
            $_restaurant = $_restaurant['restaurant'];
            $name = self::DEFAULT_VALUE;
            $site = self::DEFAULT_VALUE;

            if (isset ($_restaurant['name'])) {
                $name = $_restaurant['name'];
            }
            if (isset ($_restaurant['url'])) {
                $site = $_restaurant['url'];
            }


            echo" <tr><td>$name </td><td>";
            echo "<a href='" . $site . "' target ='_blank'>More Info</a>";
        }
        echo"</table>";
    }

//============================== GETTERS ==============================//
    public function getRatingView() {
        return $this->ratingView;
    }

    public function getCuisineArray(){
        return $this->cuisineArray;
    }

}

