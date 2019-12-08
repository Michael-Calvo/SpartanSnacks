<?php
require_once 'Controllers/EventControl.php';

echo "Cuisine of the Day: " , $cuisineDay;
//creates new instance of restaurant controller and load the view using method from eventmodel
echo $myevent->loadEventView($Event_restaurants);
