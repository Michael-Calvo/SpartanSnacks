<?php
/**
 *  This class is designed for displaying restaurant information for the cuisine
 * of the day.
 * @author Harinder Badesha
 * Updated: 11/13/2019
 */

class EventView{

    const DEFAULT_VALUE = "No Info";

    //loads view of restaurant table.
    public function loadView ($restaurantArray) {
        self::createEventTable ($restaurantArray);

    }

    //creates a table of restaurant name and link to their website.
    private function createEventTable ($restaurantArray) {
        echo "<table id='restaurantTable'>";

        echo"<tr class='header'><th style='width:25%;'>Restaurant</th><th style='width:25%;'>Info</th>";
        foreach ($restaurantArray as $restaurant) {
            $restaurant = $restaurant['restaurant'];
            $name = self::DEFAULT_VALUE;
            $site = self::DEFAULT_VALUE;

            if (isset ($restaurant['name'])) {
                $name = $restaurant['name'];
            }
            if (isset ($restaurant['url'])) {
                $site = $restaurant['url'];
            }


            echo" <tr><td>$name </td><td>";
            echo "<a href='" . $site . "' target ='_blank'>More Info</a>";
        }
        echo"</table>";
    }
}