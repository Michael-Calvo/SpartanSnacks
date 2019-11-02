<?php

include_once "ZomatoAPI.php";
include_once "APIAdapterInterface.php";

/**
 * This class connects to the ZomatoApi
 * 
 * @author Isaac Taylor, ...
 *  Updated: 11/02/2019
 */
class ZomatoAdapter implements APIAdapterInterface {

    private $zomato;

    /**
     * Constructs a zomatoApi object that will be able to attain restaurant data
     * 
     * @param ZomatoApi $_zomato
     */
    public function __construct (ZomatoApi $_zomato) {
        $this->zomato = $_zomato;
    }

    /**
     * This function returns an array of only cuisine names from pairs of cuisine names and ids;
     * 
     * @return array an array of cuisine names
     */
    public function getCuisineNames () {
        $names = array ();
        $pairs = $this->getCuisineIdPairs ();
        foreach  ($pairs as $item) {
            array_push ($names,  ($this->zomato->jParser ('cuisine', $item))['cuisine_name']);
        }

        return $names;
    }

    /**
     * This function returns an array of only cuisine ids from pairs of cuisine names and ids
     * 
     * @return array an array of cuisine ids 
     */
    public function getCuisineIds () {
        $ids = array ();
        $pairs = $this->getCuisineIdPairs ();
        foreach  ($pairs as $item) {
            array_push ($ids,  ($this->zomato->jParser ('cuisine', $item))['cuisine_id']);
        }

        return $ids;
    }

    /**
     * This function returns an array of cuisines and their ids 
     * ex. Array  ( [0] => Array  ( [cuisine] => Array  ( [cuisine_id] => 152 [cuisine_name] => African ) ) 
     * [1] => Array  ( [cuisine] => Array  ( [cuisine_id] => 1 [cuisine_name] => American ) ) ...
     * 
     * @return array an array of cuisines mapped to their ids
     */
    public function getCuisineIdPairs () {
        $this->zomato->setAndRequest (ZomatoAPI::getCuisineUrl());
        return $this->zomato->jParser ('cuisines', $this->zomato->getContent ());
    }

    /**
     * This function returns an array of restaurants,filtered by ratings  (high-low),
     * distance, and cuisines.
     * 
     * @param array $_arrayOfCuisineIds - an array of cuisine ids
     * @param int $_distance - the maximum distance from the subzone that a restaurant may be located
     * @param int $_minRating -  the minimum rating a restaurant may have
     * @return array - an array of restaurants based on the users selections 
     * @throws Exception if distance is invalid
     */
    public function getRestaurantsByCIdsAndFilters ($_arrayOfCuisineIds, $_distance, $_minRating) {
        //checks to see if the method is recieving a valid distance
        if (!isset (ZomatoApi::getDistances()["$_distance"])) {
            throw new Exception ('Invalid distance - review ZomatoApi DISTANCES');
        }
        //construction of request url with filters
        $urlFirstHalf = "https://developers.zomato.com/api/v2.1/search?entity_id="
                . ZomatoApi::getSubzoneId() . "&entity_type=" . ZomatoApi::getEntityType() .
                "=" . ZomatoApi::getLatitude() . "&lon=" . ZomatoApi::getLongitude() .
                "&radius=" . $this->milesToMeters (ZomatoApi::getDistances()["$_distance"]) .
                "&cuisines=";
        //continued construction of request url with cuisines
        $urlSecondHalf = "";
        $firstIteration = true;
        $reccomendedRestaurants = null;
        if (is_array ($_arrayOfCuisineIds)) {
            //looping through ids and adding them to url query in the format that zomato requires
            foreach ($_arrayOfCuisineIds as $id) {
                if  ($firstIteration == true) {
                    $urlFirstHalf = $urlFirstHalf . $id . "";
                    $firstIteration = false;
                } else {
                    $urlSecondHalf = $urlSecondHalf . "%2C" . $id;
                }
            }
            //this echo is just for testing... will be removed
            echo "<br> <br> <b>Constructed Request URL: </b>" . $urlFirstHalf . $urlSecondHalf;
            $this->zomato->setAndRequest ($urlFirstHalf . $urlSecondHalf);
            $reccomendedRestaurants = $this->zomato->jParser ('restaurants', $this->zomato->getContent ());
        }
        return $this->getRestaurantsByAvgRating ($reccomendedRestaurants, $_minRating);
    }

    /**
     * This is a helper function that converts miles to meters.
     * 
     * @param int $_miles - the number of miles in meters
     */
    public function milesToMeters ($_miles) {
        // number of miles multiplied by converstion factor
        return $_miles * ZomatoApi::getMilesAsMeters();
    }

    /**
     * This function returns an array of restaurants with ratings of $_minRating or higher.
     * 
     * @param array $_sortedArray - an array sorted by ratings  (high-low)
     * @param int $_minRating - the user selected, minimum average rating, a restaurant may have
     * @return array -  a sorted array of restaurants with avg ratings at least $_minRating 
     */
    public function getRestaurantsByAvgRating ($_sortedArray, $_minRating) {
        $count = 0;
        foreach ($_sortedArray as $restaurant) {
            //an array containing a restaurant and all its data
            $restaurant = $this->zomato->jParser ('restaurant', $restaurant);
            //rating info exracted from a restaurant array 
            $usersRating = ($this->zomato->jParser ('user_rating', $restaurant));
            //the average rating of a restaurant 
            $rating = floatval ($this->zomato->jParser ('aggregate_rating', $usersRating));
            //counting the number of acceptable restuarants with a avg rating that is at least the minimum rating
            if ($rating >= $_minRating) {
                $count++;
            } else {
                break;
            }
        }
        //returning restuarants from the sorted restaurant array and dropping values beyond count
        return array_slice ($_sortedArray, 0, $count);
    }

}
