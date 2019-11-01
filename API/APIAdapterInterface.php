<?php
/**
 * This is the adapter interface that all API adapters must follow
 */
interface APIAdapterInterface {

    public function getCuisineIdPairs();

    public function getCuisineIds();

    public function getCuisineNames();

    public function getRestaurantsByCIdsAndFilters($_arrayOfCuisineIds, $distance,$_minRating);

    //public function getRestaurantsByAvgRating($_arrayOfRestaurants, $_minRating);
}
