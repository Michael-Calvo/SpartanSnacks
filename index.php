<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require_once'API/ZomatoAdapter.php';
$title = "Home";
$content = "Welcome to SpartanSnacks!";
//quick test
$forCuisines = new ZomatoAdapter(new ZomatoApi());
$cusNames = $forCuisines->getCuisineNames();
//end test
include 'GUI/HomeView.php';
?>