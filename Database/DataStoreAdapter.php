<?php

//author Mike Calvo, Ike Quigly
require_once 'Database/mySqlConnector.php';
include_once 'Models/NewUserSearch.php';

class DataStoreAdapter {

    protected $connector;

    //This fuction is made to create an instance of the mySqlConnector
    public function createConnector() {
        $this->connector = new MySQLConnector();
    }

    //This is used to create a new object using the data from the NewUserSearch
    //Then put it through the MySqlConnector so it can be put in the database
    public function createObject($_NewUserSearch) {
        $_UserID = $this->connector->createObject($_NewUserSearch);
        $_NewUserSearch->setUserID($_UserID);
        echo "{$_NewUserSearch->getUserID()}";
    }

    //Suppose to read object. Ike creates a generic type object and returns it.
    //Not sure why.
    public function readObject($_NewUserSearch) {
        $results = $this->connector->readObject($_NewUserSearch);
        return $results;
    }

    //returns the update object for the sql connector using a
    //get Properties from the data factory, the UUID, and a getDataTable.
    //How to do properties and datatable is still in the air.
    public function updateObject($_NewUserSearch) {
        return $this->connector->updateObject($_NewUserSearch);
    }

    public function deleteObject($_NewUserSearch) {
        return $this->connector->updateObject($_NewUserSearch);
    }

}
