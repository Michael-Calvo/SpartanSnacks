<?php
require_once 'Database/DataStoreAdapter.php';

//Author: Mike Calvo
abstract class newUserSearch {

    protected $userID;
    protected $uuid;
    protected $color;

    /**
     * Creates a user class and generates a uuid for it.
     */
   public function __construct() {
       DataStoreAdapter::createConnector();
        $this->setUuid($this->generateUuid());
    }

    /**
     * save item to the database
     */
    public function save() {
        if($this->userID ==0){
            return DataStoreAdapter::createObject($this);
        }else{
            return DataStoreAdapter::updateObject($this);
        }
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

    public function getUserID() {
        return $this->userID;
    }

    public function getColor() {
        return $this->color;
    }


    //============================== SETTER ==============================//

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setColor() {
        return $this->Color;
    }


}
