<?php

/**
 * This user Class will be used to create a new user to be inserted into the
 * database with a time, to see how often the site is used. The other userclass
 * Will be either deprecated or added to another sql table given time.
 */
abstract class newUserSearch {

    protected $time;
    protected $userID;
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
        $map = new SplObjectStorage();
        $map["ID"] = $_userID;
        return $this->loadByCondition(map);
    }

    /**
     * loading by the uuid from the database
     * @param type $_uuid
     */
    public function loadByUuid($_uuid) {
        $map = new SplObjectStorage();
        $map["UUID"] = $_uuid;
        return $this->loadByCondition(map);
    }

    /**
     * loading the UserClass from a name value pair
     * @param type $_name
     * @param type $_value
     */
    public function loadByCondition($_name, $_value) {
        $map = new SplObjectStorage();
        $_key = $_name;

        $map[$_key] = $_value;

        return $this->loadByCondition(map);
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

    public function getUserID() {
        return $this->userID;
    }

    function getTime() {
        return $this->time;
    }

    //============================== SETTER ==============================//

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    function setTime($time): void {
        $this->time = $time;
    }

}
