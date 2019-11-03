<?php
/**
 * The RestaurantController accepts data given to it from the RestaurantView 
 * and can alert the RestaurantModel to store data in the database or update the view. 
 *
 * @author Taylor
 * Updated: 11/02/2019
 * 
 */
class RestaurantController {

    private $view;

    public function __construct() {
        
    }

    public function invoke() {
        // let the model interact with the data and database
    }

    /**
     * Updates and displays the restaurant view without interacting with the model
     * (function must be called with:: instead of ->)
     * 
     * @param array $restaurantArray - an array of restaurants
     */
    public static function loadBasicView($restaurantArray) {
        include '../Views/RestaurantView.php';
        $view = new RestaurantView();
        $view::loadView($restaurantArray);
    }

}
