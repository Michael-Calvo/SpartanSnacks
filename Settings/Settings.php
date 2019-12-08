<?php

//sets timezone to EST.
const timezone = 'EST';
date_default_timezone_set(timezone);

//creates an array with cuisine names as keys to each day of the week.
$daysArray = array( "Sunday" => 'Southern',"Monday" => 'Chinese', "Tuesday" => 'Mexican',
    "Wednesday" => 'Greek', "Thursday" => 'Japanese', "Friday" => 'Burger', "Saturday" => 'Italian');

//sets the cuisine of the day depending on what day it is. date("l") returns a day(Monday).
$cuisineDay = $daysArray[date("l")];