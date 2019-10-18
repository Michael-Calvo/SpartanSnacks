<?php

interface APIAdapterInterface {

    public function getCuisineIdPairs();

    public function getRestaurantsByCuisineId($_arrayOfCuisineIds);

    public function setGeneralLocation($_generalLoc);

    public function adjustLocationRadius($_radius);

    public function getRestaurantById($_resID);

    public function getRestaurantsByAvgRating($_minRating);
}
