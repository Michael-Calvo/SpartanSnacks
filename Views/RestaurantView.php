<?php

/**
 *  This class is designed for displaying restaurant data in a visually acceptable way for users
 */
class RestaurantView {

    const DEFAULT_VALUE = "No Info";
    
    /**
     * loads the view containing results of users cuisine and filter choices
     * 
     * @param array $restaurantArray - an array of restaurants
     */
    static function loadView($restaurantArray) {
        self::beforeRestaurantTable();
        self::createRestaurantTable($restaurantArray);
        self::afterRestaurantTable();
    }
    
    
    private function createRestaurantTable($restaurantArray) {
        echo count($restaurantArray) . " result(s) have been found for you.";
        echo " <input type='text' id='userInput' onkeyup='restaurantNameFilter()' placeholder='Find restaurant by name...'>
        <table id='restaurantTable'>";

        echo"<tr class='header'><th style='width:25%;'>Restaurant Name</th><th style='width:25%;'>Info</th>
        <th style='width:25%;'>Address</th><th style='width:25%;'>Ex. # of Spartans who have been here</th></tr>";
        foreach ($restaurantArray as $restaurant) {
            $restaurant = $restaurant['restaurant'];
            $name = self::DEFAULT_VALUE;
            $site = self::DEFAULT_VALUE;
            $address = self::DEFAULT_VALUE;
            $num = "#" . " (or some other info we want to show)";

            if (isset($restaurant['name'])) {
                $name = $restaurant['name'];
            }
            if (isset($restaurant['url'])) {
                $site = $restaurant['url'];
            }
            if (isset($restaurant['location'])) {
                $address = ($restaurant['location'])['address'];
            }

            echo" <tr><td>$name </td><td>";
            echo "<a href='" . $site . "'>More Info</a>";
            echo"</td><td>$address</td><td>$num </td></tr>";
        }
        echo"</table>";
    }

    /**
     *  creates html that forms page before restaurant table has been created
     */
    private function beforeRestaurantTable() {
        echo "<html>";
        include 'Head.php';
        echo "<body> <div id='wrapper'><div id='banner'></div>";
        include 'MainNavigation.php';
        echo"<div id='content_area'>
        <script type='text/javascript' src='../JavaScript/RestaurantFilter.js'>
        </script>";
    }

    /**
     *  creates html that forms remainder of view page after restaurant table has been created
     */
    private function afterRestaurantTable() {
        echo "</div> </body>";
        include 'Footer.php';
        echo"</html>";
    }

}
