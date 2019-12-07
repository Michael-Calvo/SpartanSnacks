<?php

/**
 * The RestaurantController accepts data given to it from the RestaurantView
 * and can alert the RestaurantModel to store data in the database or update the view.
 *
 * @author Taylor,Badesha
 * Updated: 11/13/2019
 *
 */
class RestaurantController {

    private $view;

    public function __construct() {

    }

    public function invoke($_ipAddress, $_color) {
        include '../DB-Updated/MySQLConnector.php';

        $userColor = new MySQLConnector();
        $userColor->createObject($_ipAddress, $_color);

        $count = new MySQLConnector();
        $count->updateObject();
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

    public static function loadEventView($restaurantArray){
        include 'Views/EventView.php';
        $view = new EventView();
        $view::loadView($restaurantArray);
    }

}
