<?php

require_once "ZomatoAPI.php";
require_once "APIAdapterInterface.php";

/**
 * This class creates  connects to a restaurant API
 *
 * @author Isaac Taylor
 *  Updated: 12/08/2019
 */

class RestaurantAdapter implements APIAdapterInterface {

    private $restaurantAPI;

    /**
     * Constructs a Restaurant API object that will be able to attain restaurant data
     *
     * @param object $_restaurantAPI - the current restaurant api that adapter is working with
     */
    public function __construct ($_restaurantAPI) {
        $this->restaurantAPI = $_restaurantAPI;
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
            array_push ($names,  ($this->restaurantAPI->jParser ('cuisine', $item))['cuisine_name']);
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
            array_push ($ids,  ($this->restaurantAPI->jParser ('cuisine', $item))['cuisine_id']);
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
        $this->restaurantAPI->setAndRequest ($this->restaurantAPI->getCuisineUrl());
        return $this->restaurantAPI->jParser ('cuisines', $this->restaurantAPI->getContent ());
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
    public function getRestaurantsByCIdsAndFilters ($_arrayOfCuisineIds, $_minRating) {
        //construction of request url with filters
        $urlFirstHalf = $this->restaurantAPI->getRestaurantUrl()
                . $this->restaurantAPI->getSubzoneId() . "&entity_type=" . $this->restaurantAPI->getEntityType() .
                "&cuisines=";
        //continued construction of request url with cuisines
        $urlSecondHalf = "";
        $firstIteration = true;
        $reccomendedRestaurants = null;
        if (is_array ($_arrayOfCuisineIds)) {
            //looping through ids and adding them to url query in the format that RestaurantAPI requires
            foreach ($_arrayOfCuisineIds as $id) {
                if  ($firstIteration == true) {
                    $urlFirstHalf = $urlFirstHalf . $id . "";
                    $firstIteration = false;
                } else {
                    $urlSecondHalf = $urlSecondHalf . "%2C" . $id;
                }
            }
            $this->restaurantAPI->setAndRequest ($urlFirstHalf . $urlSecondHalf);
            $reccomendedRestaurants = $this->restaurantAPI->jParser ('restaurants', $this->restaurantAPI->getContent ());
        }
        return $this->getRestaurantsByAvgRating ($reccomendedRestaurants, $this->restaurantAPI->getRatings()["$_minRating"]);
    }


    /**
     * This function returns an array of restaurants with ratings of $_minRating or higher.
     *
     * @param array $_restaurantArray - an array containing restaurant information
     * @param int $_minRating - the user selected, minimum average rating, a restaurant may have
     * @return array -  a sorted array of restaurants with avg ratings at least $_minRating
     */
    public function getRestaurantsByAvgRating ($_restaurantArray, $_minRating) {
        // callback function that usort uses to sort restaurants
        function sortMethod($a,$b) {
          // return -1 if value "a" is not larger or 1 if "a" is larger
          return ($a["restaurant"]["user_rating"]["aggregate_rating"] -
                  $b["restaurant"]["user_rating"]["aggregate_rating"]) <= 0 ? -1 : 1;
        }
        usort($_restaurantArray, "sortMethod");
        $splitPoint = 0;
        for($i = 0; $i < count($_restaurantArray); $i++) {
            if(($_restaurantArray[$i]["restaurant"]["user_rating"]["aggregate_rating"]) <= $_minRating && $_minRating!= 1){
                $splitPoint = $i+1;
            } else {
                break;
            }
        }
        //returning restaurants from the restaurant array and dropping array
        //at splitPoint where values are less than _minRating
        return array_reverse (array_slice ($_restaurantArray, $splitPoint));
    }
}

