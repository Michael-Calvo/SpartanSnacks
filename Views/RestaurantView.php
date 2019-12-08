<?php

/**
 *  This class is designed for displaying restaurant data in a visually acceptable way for users
 *
 * @author Isaac Taylor
 * Updated: 10/23/2019
 */
class RestaurantView {

    const DEFAULT_VALUE = "No Info";

    /**
     * loads the view containing results of users cuisine and filter choices

     *
     * @param array $_restaurantArray - an array of restaurants
     * @param string $_color - a user selected color

     */
    static function loadView($_restaurantArray, $_color = null) {
        self::beforeRestaurantTable();
        self::createRestaurantTable($_restaurantArray);
        self::afterRestaurantTable();
        if (!empty($_color)) {
            echo "<p hidden id = 'selectedColor' >$_color</p>";
            echo "<script type='text/javascript' src='../JavaScript/ColorEffect.js'></script>";
        }
    }

    private function createRestaurantTable($_restaurantArray) {

        echo count($_restaurantArray) . " result (s) have been found for you.";
        echo " <input type='text' id='userInput' onkeyup='restaurantNameFilter ()' placeholder='Find restaurant by name...'>

        <table id='restaurantTable'>";

        echo"<tr class='header'><th style='width:25%;'>Restaurant Name</th><th style='width:25%;'>Info</th>
        <th style='width:25%;'>Address</th><th style='width:25%;'>Ratings</th></tr>";
        foreach ($_restaurantArray as $_restaurant) {
            $_restaurant = $_restaurant['restaurant'];
            $name = self::DEFAULT_VALUE;
            $site = self::DEFAULT_VALUE;
            $address = self::DEFAULT_VALUE;
            $rating = self::DEFAULT_VALUE;

            if (isset($_restaurant['name'])) {
                $name = $_restaurant['name'];
            }
            if (isset($_restaurant['url'])) {
                $site = $_restaurant['url'];
            }
            if (isset($_restaurant['location'])) {
                $address = ($_restaurant['location'])['address'];
            }
            if (isset($_restaurant['user_rating'])) {
                $rating = ($_restaurant['user_rating'])['aggregate_rating'];
            }


            echo" <tr><td>$name </td><td>";
            echo "<a href='" . $site . "' target ='_blank'>More Info</a>";
            echo"</td><td>$address</td><td>$rating </td></tr>";
        }
        echo"</table>";
    }

    /**
     *  creates html that forms page before restaurant table has been created
     */
    private function beforeRestaurantTable() {
        echo "<html>";
        $title = "Results";
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
