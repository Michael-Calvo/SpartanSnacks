<!-- view that displays the cuisine of the day table for homeview.
Authors @ Badesha
Updated 12/8/2019
-->
<?php
include 'Controllers/EventControl.php';

echo "Cuisine of the Day: ", $cuisineDay;
$event = new EventControl($adapterObject,$cuisineDay);
$event->launchEvent();


