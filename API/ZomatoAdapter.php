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
     * Constructs a zomato object that will be able to attain restaurant data
     * @param ZomatoApi $_zomato
     */
    public function __construct(ZomatoApi $_zomato) {
        $this->zomato = $_zomato;
    }

    /**
     * This function returns an array of all the cuisine names;
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
     * This function returns an array of restaurants when given an array of restaurant ids
     * 
     * @param type $_resID - the restaurants id
     */
    public function getRestaurantById($_resID) {
        
    }

    /**
     * This function returns an array of restaurants with ratings of $_minRating or higher
     * 
     * @param type $_minRating
     */
    public function getRestaurantsByAvgRating($_minRating) {
        
    }

    /**
     * This function returns an array of restaurants by cuisine ids
     * 
     * @param type $_arrayOfCuisineIds
     */
    public function getRestaurantsByCuisineId($_arrayOfCuisineIds) {
        //METHOD DEVELOPED BUT NOT YET TESTED
        $urlFirstHalf = "https://developers.zomato.com/api/v2.1/search?entity_id=" . ZomatoApi::DEFAULT_CITY_ID;
        $urlSecondHalf = "&entity_type=city&cuisines=";
        $count = 0;
        if (is_array($_arrayOfCuisineIds)) {
            //looping through ids and adding them to url query in format that zomato requires
            foreach ($_arrayOfCuisineIds as $id) {
                if ($count < 1) {
                    $urlSecondHalf += "$id%2C";
                } else {
                    $urlSecondHalf += "%20" . $id;
                }
                $count++;
            }
            $this->zomato->setAndRequest($urlFirstHalf + $urlSecondHalf);
        }
        return $this->zomato->jParser('restaurant', $this->zomato->getContent());
    }

    /**
     * This function sets a centralized location of where the restaurants are 
     * 
     * @param $_generalLoc - a city 
     */
    public function setGeneralLocation($_generalLoc) {
        
    }

    /**
     * This function returns an array of restaurants that are within a certain distance of a set location 
     * 
     * @param type $_radius - distance in miles
     */
    public function adjustLocationRadius($_radius) {
        
    }

}
