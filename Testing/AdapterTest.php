<?php

require '../API/RestaurantAdapter.php';

/**
 * This class Tests the getRestaurantsByCIdsAndFilters() and getRestaurantsByAvgRating() functions
 * in the RestaurantAdapter class.
 *
 * @author Isaac Taylor
 * Updated: 12/08/2018
 */
class AdapterTest {

    private $restaurantAdapter;

    function __construct() {
        $this->restaurantAdapter = new RestaurantAdapter(new ZomatoAPI());
    }

    /**
     * This method runs 8 normal test cases for the getRestaurantsByCIdsAndFilters() function and
     * checks if a restaurant array has been returned from the API.
     */
    public function normalCaseTestsGetRestCIDFilters($_normalTests) {
        print_r($this->restaurantAdapter->getRestaurantsByAvgRating(array(123), "Any Rating"));
        /*
        for ($i = 0; $i < count($_normalTests); $i++) {
            echo "Normal Test " . ($i + 1) . " for getRestaurantsByCIdsAndFilters(): " . ""
            . "<br>";
            if(true){
                echo "passed";
            }else{
                echo "failed";
            }
        }*/
    }

    public function errorCaseTestgetRestaurantsByAvgRating($actual, $_expected) {

    }

    public function edgeCaseTestRestaurantsByAvgRating($_acutual, $_expected) {
        $result = $this->restaurantAdapter->getRestaurantsByAvgRating($_acutual, 2);
        if($result === $_expected) {
            echo "Passed the test" . "<br>";
        }
        else {
            echo "Failed the test" . "<br>";
        }
    }
}
