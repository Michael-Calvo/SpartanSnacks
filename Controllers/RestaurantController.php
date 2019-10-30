<?php

/**
 * The RestaurantController accepts data given to it from the RestaurantView 
 * and can alert the RestaurantModel to store data in the database or update the view. 
 *
 * @author 
 */
class RestaurantController {

    public $restaurantModel;
    public $rating;
    public $distance;
    public $cuisine;
    public function __construct($rating, $distance, $cuisineCB) {
        $this->restaurantModel = new RestaurantModel();
    }

    public function invoke() {
        // let the model interact with the data and database
    }
    
    public function loadView() {
        
    }

}
