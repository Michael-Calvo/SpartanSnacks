<?php

/**
 * The RestaurantController accepts data given to it from the RestaurantView
 * and can store data in the database or update the view.
 *
 * @author Taylor,Badesha
 * Updated: 11/13/2019
 *
 */
class RestaurantController {

    private $view;

    public function __construct() {

    }

   /**
    *
    * @param type $_restaurantArray
    * @param type $_color
    */
    public static function loadBasicView($_restaurantArray, $_color = null) {
        include '../Views/RestaurantView.php';
        $view = new RestaurantView();
        $view::loadView($_restaurantArray, $_color);
    }

}
