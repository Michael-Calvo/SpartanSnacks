<?php

require_once 'Database/DataStoreAdapter.php';

//Author: Mike Calvo
class NewUserSearch {

    protected $userID;
    protected $uuid;
    protected $color;
    protected $dataStoreAdapter;

    /**
     * Creates a user class and generates a uuid for it.
     */
    public function __construct($_color) {
        $dataAdapter = new DataStoreAdapter();
        $dataAdapter->createConnector();
        $this->dataStoreAdapter = $dataAdapter;
        $this->setUuid($this->generateUuid());
        $this->setColor($_color);
        return $this->dataStoreAdapter;
    }

    /**
     * save item to the database
     */
    public function save() {

        if ($this->userID == 0) {
            return $this->dataStoreAdapter->createObject($this);
        } else {
            return $this->dataStoreAdapter->updateObject($this);
        }
    }

    /**
     * Uses php's com_create_guid to create a UUID
     *
     * @return type String of UUID
     */
    protected function generateUuid() {
        $_uuid = uniqid();
        return $_uuid;
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

    public function setColor($color) {

        $this->color = $color;
    }

}
