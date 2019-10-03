<?php

/**
 * This class represents a Restaurant object and its information.
 *
 * @author <your name(s)> Updated on: 9/28/2019
 */
class Restaurant extends Zomato {

    private $_resId;
    private $resId;
    private $name;
    private $cuisine;
    private $url;
    private $menuUrl;
    private $distance;
    private $address;
    private $avgRating;
    private $hasDelivery;
    private $avgCostForTwo;
    private $reviews = array();

    /**
     * This is the constructor for a Restaurant object
     * 
     * @param $_requestUrl -  url where zomato data is being stored
     * @param $_apiKey -  required api key from zomato
     * @throws Exception when $_requestUrl, $_apiKey, or $_resId are empty;
     */
    public function __construct($_requestUrl, $_apiKey, $_resId) {
        parent::__construct($_requestUrl, $_apiKey);
        if($_resId == null){
            throw new Exception("Restaurant id must be provided");
        }
        $this->setResId($_resId);
        $this->setAllFields();
    }

    /**
     * This function finds and returns any value in an array when given a valid key that exists, but
     * if a value cannot be found, it returns "Info currently not available"
     * 
     * @param $_key - a key that a value can be accessed by
     */
    public function findValueById($_key) {
        $requestedValues = array('id', $_key);
        $json = $this->getContent();
        $idsAndValues = $this->jParser($json['restaurants'], $requestedValues);
        foreach ($idsAndValues as $item) {
            if ($item[0] == $this->getResId()) {
                return $item[1];
            }
        }
        return "Info currently not available";
    }

    /**
     * This function calculates the distance from this restaurant to UNC Greensboro
     */
    public function calcDistanceFromUncg() {
        //will remove once method is completed 
        throw new Exception("Incomplete Method");
    }

    /**
     * This function returns an array of reviews, about this restaurant, sorted from good to bad
     */
    public function sortReviews() {
        //will remove once method is completed 
        throw new Exception("Incomplete Method");
    }

    /**
     * This function calls every setter to set all the Restaurant fields
     */
    public function setAllFields() {
        $this->setName($this->findValueById('name'));
        //will remove once method is completed 
        throw new Exception("Incomplete Method");
    }

    //========================= GETTERS ============================================

    public function getResId() {
        return $this->resId;
    }

    public function getName() {
        return $this->name;
    }

    public function getCuisine() {
        return $this->cuisine;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getMenuUrl() {
        return $this->menuUrl;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getAvgRating() {
        return $this->avgRating;
    }

    public function getHasDelivery() {
        return $this->hasDelivery;
    }

    public function getAvgCostForTwo() {
        return $this->avgCostForTwo;
    }

    //========================= SETTERS ============================================

    private function setResId($_resId) {
        $this->resId = $_resId;
    }

    private function setName($_name) {
        $this->name = $_name;
    }

    private function setCuisine($_cuisine) {
        $this->cuisine = $_cuisine;
    }

    private function setUrl($_url) {
        $this->url = $_url;
    }

    private function setMenuUrl($_menuUrl) {
        $this->menuUrl = $_menuUrl;
    }

    private function setDistance($_distance) {
        $this->distance = $_distance;
    }

    private function setAddress($_address) {
        $this->address = $_address;
    }

    private function setAvgRating($_avgRating) {
        $this->avgRating = $_avgRating;
    }

    private function setHasDelivery($_hasDelivery) {
        $this->hasDelivery = $_hasDelivery;
    }

    private function setAvgCostForTwo($_avgCostForTwo) {
        $this->avgCostForTwo = $_avgCostForTwo;
    }

}
