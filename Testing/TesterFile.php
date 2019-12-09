<?php

/**
 * This file creates an AdapterTest object and calls calls the functions that
 * perform tests.
 * @author Isaac Taylor
 * Updated: 12/09/2019
 */
require "AdapterTest.php";

 $MAX_RATING = 5;
 $MIN_RATING = 1;

$restaurantAdapter;
$normalTestCaseOne = array(1, "5/5 only");
$normalTestCaseTwo = array(1, 2, "4/5 or better");
$normalTestCaseThree = array(11, 5, 8, "3/5 or better");
$normalTestCaseFour = array(6, 3, 9, 44, "2/5 or better");
$normalTestCaseFive = array(4, 23, 33, 3, 5, "Any Rating");
$normalTestCaseSix = array(12, 13, 7, 1, 2, 3, "Any Rating");
$normalTestCaseSeven = array(1, 3, 5, 4, 6, 7, 22, "2/5 or better");
$normalTestCaseEight = array(2, 4, 6, 8, 12, 14, 16, 18, "3/5 or better");
$normalTests = array($normalTestCaseOne,$normalTestCaseTwo,$normalTestCaseThree,$normalTestCaseFour,
    $normalTestCaseFive, $normalTestCaseSix,$normalTestCaseSeven, $normalTestCaseEight);
//used for testing average rating sort functionality when given ratings at lowest and highest extremes.
$edgeCase = array(array("restaurant" => array("user_rating" => array("aggregate_rating" => $MIN_RATING)),
    array("restaurant" => array("user_rating" => array("aggregate_rating" => 3)))),
    array("restaurant" => array("user_rating" => array("aggregate_rating" => $MAX_RATING))));
$expectedEdgeResult = array(array("restaurant" => array("user_rating" => array("aggregate_rating" => $MAX_RATING))),
    array("restaurant" => array("user_rating" => array("aggregate_rating" => 3))),
    array("restaurant" => array("user_rating" => array("aggregate_rating" => $MIN_RATING))));


$test = new AdapterTest();

// 8 Normal tests for

//$test->normalCaseTestsGetRestCIDFilters($normalTests);

//  Edge Test for
$test->edgeCaseTestRestaurantsByAvgRating($edgeCase, $expectedEdgeResult);

