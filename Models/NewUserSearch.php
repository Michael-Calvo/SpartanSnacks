<?php

require_once 'Database/DataStoreAdapter.php';

//Author: Mike Calvo
abstract class newUserSearch {

    protected $IP;
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
        $map = array();
        $map["ID"] = $_userID;
        return DataStoreAdapter.readObject($map);
    }

    /**
     * loading by the uuid from the database
     * @param type $_uuid
     */
    public function loadByUuid($_uuid) {
        $map = array();
        $map["UUID"] = $_uuid;
        return DataStoreAdapter.readObject($map);
    }

    /**
     * loading the UserClass from a name value pair
     * @param type $_name
     * @param type $_value
     */
    public function loadByCondition($_name, $_value) {
        $map = array();
        $map[$_name] = $_value;

        return DataStoreAdapter.readObject($map);
    }

    /**
     * save item to the database
     */
    public function save() {
        if ($this->userID == 0) {
            return DataStoreAdapter . createObject($this);
        } else {
            return DataStoreAdapter . updateObject($this);
        }

        return false;
    }

    /**
     * delete item from the database
     */
    public function delete() {
        return DataStoreAdapter . deleteObject($this);
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

    function getIP() {
        return $this->IP;
    }

    //============================== SETTER ==============================//

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    function setIP($IP): void {
        $this->IP = $IP;
    }

}
