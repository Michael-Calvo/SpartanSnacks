<!--Index file which serves as the homepage of the website.
authors @Badesha,Taylor
Updated 10/25/2019
-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require_once 'Settings/Settings.php';
$homeUrl = '/index.php';
$title = "SpartanSnacks - Restaurant Finder";
$content = "Welcome to SpartanSnacks!";
require 'API/RestaurantAdapter.php';
$adapterObject = new RestaurantAdapter(new ZomatoAPI());
//array of cusine names for displaying in HomeView
$cusNames = $adapterObject->getCuisineNames();
//array of cusine ids for setting html checkbox values
$idValues = $adapterObject->getCuisineIds();
include 'Views/HomeView.php';