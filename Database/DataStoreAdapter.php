<?php

//author Mike Calvo, Ike Quigly
require_once 'Database/mySqlConnector.php';
require_once 'Database/NewUserSearch.php';

class DataStoreAdapter{
    //This fuction is made to create an instance of the mySqlConnector
    public function _createConnector(){
    $this->connector = new MySQLConnector();
    }
    //This is used to create a new object using the data from the NewUserSearch
    //Then put it through the MySqlConnector so it can be put in the database
    public function createObject(){
        $id = $this->connector->createObject($newSearch);


    }
    //Suppose to read object. Ike creates a generic type object and returns it.
    //Not sure why.
    public function readObject($map){
        $results = $this->connector->readObject($map, $table);


    }
    //returns the update object for the sql connector using a
    //get Properties from the data factory, the UUID, and a getDataTable.
    //How to do properties and datatable is still in the air.
    public function updateObject($obj){
        return $this->connector->updateObject($DUMMY, $obj.getUuid(),$DUMMY);
    }
    public function deleteObject($obj){
        return DataStoreAdapter::updateObject($obj);
    }




}
