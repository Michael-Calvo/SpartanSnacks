<?php

/**
 * Description of UserClass
 * 
 * This class creates a user profile based on the filters chosen by the user.
 * Modeled after the DataObject class given in lecture
 * 
 *
 * @author Mike Calvo
 */
abstract class UserClass {

    protected $cuisineType;
    protected $distance;
    protected $userID;
    protected $rating;
    protected $uuid;

    /**
     * Creates a user class and generates a uuid for it.
     */
    public function UserClass() {
        $this->setUuid($this->generateUuid());
    }

    /**
     * Loading an object by the user ID from the database
     * @param type $_userID
     */
    public function loadById($_userID) {

        //to do stub
    }

    /**
     * loading by the uuid from the database
     * @param type $_uuid
     */
    public function loadByUuid($_uuid) {

        //to do stub
    }

    /**
     * loading the UserClass from a name value pair
     * @param type $_name
     * @param type $_value
     */
    public function loadByCondition($_name, $_value) {

        //to do stub
    }

    /**
     * save item to the database
     */
    public function save() {
        
    }

    /**
     * delete item from the database
     */
    public function delete() {
        
    }

    /**
     * Uses php's com_create_guid to create a UUID
     * 
     * @return type String of UUID
     */
    protected static function generateUuid() {
        return com_create_guid();
    }

    //============================== GETTERS ==============================//
    public function getUuid() {
        return $this->uuid;
    }

    public function getCuisineType() {
        return $this->cuisineType;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getRating() {
        return $this->rating;
    }

    //============================== SETTER ==============================//

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function setCuisineType($cuisineType) {
        $this->cuisineType = $$cuisineType;
    }

    public function setDistance($distance) {
        $this->distance = $distance;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

}
