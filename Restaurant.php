<?php

/**
 * This class represents a Restaurant object and its information.
 *
 * @author <your name(s)> Updated on: 9/28/2019
 */
class Restaurant extends Zomato {

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
     * @throws Exception when $_requestUrl or $_apiKey are empty;
     */
    public function __construct($_requestUrl, $_apiKey, $_resId = null) {
        parent::__construct($_requestUrl, $_apiKey, $_resId);
        if ($_resId != null) {
            $this->setResId($_resId);
            $this->setAllFields();
        }
    }

    /**
     * This function finds and returns any value in an array when given a valid key that exists, but
     * if a value cannot be found, it returns "Info currently not available"
     * 
     * @param $_res_Id - a restaurant id
     * @param type $_key - a key that value can be accessed by
     */
    public function findValueById($_res_id, $_key) {
        
    }

    /**
     * This function calculates the distance from this restaurant to UNC Greensboro
     */
    public function calcDistanceFromUncg() {
        
    }

    /**
     * This function returns an array of reviews, about this restaurant, sorted from good to bad
     */
    public function sortReviews() {
        
    }

    /**
     * This function calls every setter to set all the Restaurant fields
     */
    public function setAllFields() {
        
    }

    //========================= GETTERS ============================================

    public function getResId() {
        return $this->resId;
    }

    public function getName() {
        
    }

    public function getCuisine() {
        
    }

    public function getUrl() {
        
    }

    public function getMenuUrl() {
        
    }

    public function getDistance() {
        
    }

    public function getAddress() {
        
    }

    public function getAvgRating() {
        
    }

    public function getHasDelivery() {
        
    }

    public function getAvgCostForTwo() {
        
    }

    //========================= SETTERS ============================================

    private function setResId($_resId) {
        $this->resId = $_resId;
    }

    private function setName($_name) {
        
    }

    private function setCuisine($_cuisine) {
        
    }

    private function setUrl($_url) {
        
    }

    private function setMenuUrl($_menuUrl) {
        
    }

    private function setDistance($_distance) {
        
    }

    private function setAddress($_address) {
        
    }

    private function setAvgRating($_avgRating) {
        
    }

    private function setHasDelivery($_hasDelivery) {
        
    }

    private function setAvgCostForTwo($_avgCostForTwo) {
        
    }

}
