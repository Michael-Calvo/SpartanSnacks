<?php

include_once "ZomatoAPI.php";
include_once "APIAdapterInterface.php";

/**
 * This class is connects to the zomato api 
 * 
 * @author Isaac Taylor, ...
 *  Updated: 10/23/2019
 */
class ZomatoAdapter implements APIAdapterInterface {

    private $zomato;

    /**
     * Constructs a zomatoApi object that will be able to attain restaurant data
     * @param ZomatoApi $_zomato
     */
    public function __construct(ZomatoApi $_zomato) {
        $this->zomato = $_zomato;
    }

    /**
     * This function returns an array of only cuisine names from pairs of cuisine names and ids;
     * 
     * @return array 
     */
    public function getCuisineNames() {
        $names = array();
        $pairs = $this->getCuisineIdPairs();
        foreach ($pairs as $item) {
            array_push($names, ($this->zomato->jParser('cuisine', $item))['cuisine_name']);
        }

        return $names;
    }

    /**
     * This function returns an array of only cuisine ids from pairs of cuisine names and ids
     * 
     * @return a cuisine id 
     */
    public function getCuisineIds() {
        $ids = array();
        $pairs = $this->getCuisineIdPairs();
        foreach ($pairs as $item) {
            array_push($ids, ($this->zomato->jParser('cuisine', $item))['cuisine_id']);
        }

        return $ids;
    }

    /**
     * This function returns an array of cuisines and their ids 
     * ex. Array ( [0] => Array ( [cuisine] => Array ( [cuisine_id] => 152 [cuisine_name] => African ) ) 
     * [1] => Array ( [cuisine] => Array ( [cuisine_id] => 1 [cuisine_name] => American ) ) ...
     * 
     * @return array 
     */
    public function getCuisineIdPairs() {
        $this->zomato->setAndRequest(ZomatoAPI::CUISINE_URL);
        return $this->zomato->jParser('cuisines', $this->zomato->getContent());
    }

    /**
     * This function returns an array of restaurants,sorted by rating (high-low) 
     * when given an array of cuisine ids and a distance
     * 
     * @param type $_arrayOfCuisineIds
     */
    public function getRestaurantsByCIdsAndFilters($_arrayOfCuisineIds, $_distance, $_minRating) {
        //checks to see if the method is recieving a valid distance
        if (!isset(ZomatoApi::DISTANCES["$_distance"])) {
            throw new Exception('Invalid distance - review ZomatoApi DISTANCES');
        }
        //construction of request url with filters
        $urlFirstHalf = "https://developers.zomato.com/api/v2.1/search?entity_id="
                . ZomatoApi::SUBZONE_ID . "&entity_type=" . ZomatoApi::ENTITY_TYPE .
                "=" . ZomatoApi::LATITUDE . "&lon=" . ZomatoApi::LONGITUDE .
                "&radius=" . $this->milesToMeters(ZomatoApi::DISTANCES["$_distance"]) .
                "&cuisines=";
        //continued construction of request url with cuisines
        $urlSecondHalf = "";
        $firstIteration = true;
        $reccomendedRestaurants = null;
        if (is_array($_arrayOfCuisineIds)) {
            //looping through ids and adding them to url query in the format that zomato requires
            foreach ($_arrayOfCuisineIds as $id) {
                if ($firstIteration == true) {
                    $urlFirstHalf = $urlFirstHalf . $id . "";
                    $firstIteration = false;
                } else {
                    $urlSecondHalf = $urlSecondHalf . "%2C" . $id;
                }
            }
            //this echo is just for testing... will be removed
            echo "<br> <br> <b>Constructed Request URL: </b>" . $urlFirstHalf . $urlSecondHalf;
            $this->zomato->setAndRequest($urlFirstHalf . $urlSecondHalf);
            $reccomendedRestaurants = $this->zomato->jParser('restaurants', $this->zomato->getContent());
        }
        return $this->getRestaurantsByAvgRating($reccomendedRestaurants, $_minRating);
    }

    /**
     * This is a helper function that converts miles to meters
     * @param type $_miles
     */
    public function milesToMeters($_miles) {
        return $_miles * ZomatoApi::MILES_AS_METERS;
    }

    /**
     * This function returns an array of restaurants with ratings of $_minRating or higher
     * 
     * @param type $_minRating
     */
    public function getRestaurantsByAvgRating($_sortedArray, $_minRating) {
        $count = 0;
        foreach ($_sortedArray as $restaurant) {
            $restaurant = $this->zomato->jParser('restaurant', $restaurant);
            $usersRating = ($this->zomato->jParser('user_rating', $restaurant));
            $rating = floatval($this->zomato->jParser('aggregate_rating', $usersRating));
            if ($rating >= $_minRating) {
                $count++;
            } else {
                break;
            }
        }
        return array_slice($_sortedArray, 0, $count);
    }

}
