<<!--Index file which serves as the homepage of the website.
authors @Badesha,Taylor
updated 10/25/2019
-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
$homeUrl = '/index.php';
require_once'API/RestaurantAdapter.php';
$title = "SpartanSnacks - Restaurant Finder";
$content = "Welcome to SpartanSnacks!";
//connect to ZomatoApi using the ZomatoAdapter
$forCuisines = new RestaurantAdapter(new Api());
//array of cusine names for displaying in HomeView
$cusNames = $forCuisines->getCuisineNames();
//array of cusine ids for setting html checkbox values
$idValues = $forCuisines->getCuisineIds();
include 'Views/HomeView.php';