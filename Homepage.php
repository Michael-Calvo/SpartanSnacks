<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
require_once'ZomatoAdapter.php';
$title = "Home";
//quick test
$forCuisines = new ZomatoAdapter(new ZomatoApi());
$cusNames = $forCuisines->getCuisineNames();
//end test
include "GUI/Page1.php";
?>