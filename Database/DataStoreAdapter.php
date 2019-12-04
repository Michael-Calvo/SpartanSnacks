<?php

//author Mike Calvo, Ike Quigly
require_once 'Database/mySqlConnector.php';
include 'Database/NewUserSearch.php';

class DataStoreAdapter{
 
    private $connector;
    

    //This fuction is made to create an instance of the mySqlConnector
    public function createConnector(){
    $connector = new MySQLConnector();
    $this->connector = $connector;
    return $this->connector;
    }

    //This is used to create a new object using the data from the NewUserSearch
    //Then put it through the MySqlConnector so it can be put in the database
    public function createObject($newSearch){
        $this->connector->createObject($newSearch);

    }
    //Suppose to read object. Ike creates a generic type object and returns it.
    //Not sure why.
    public function readObject($newSearch){
        $results = $this->connector->readObject($newSearch);
        return $results;
    }
    //returns the update object for the sql connector using a
    //get Properties from the data factory, the UUID, and a getDataTable.
    //How to do properties and datatable is still in the air.
    public function updateObject($newSearch){
        return $this->connector->updateObject();
    }
    public function deleteObject($newSearch){
        return DataStoreAdapter::updateObject($newSearch);
    }




}
