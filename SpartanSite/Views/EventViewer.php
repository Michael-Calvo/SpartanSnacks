<?php

class EventViewer {

    public function loadEventView($_restaurantArray, $_cuisineDay) {
        echo "Cuisine of the Day: ", $_cuisineDay;
        include 'Views/EventTable.php';
        $view = new EventView();
        $view::loadView($_restaurantArray);
    }

}
