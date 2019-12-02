<?php

class mySqlConnector implements DataBaseInterface {

//Author: Mike Calvo, Ike Quigley
//Connects to the database
    public function connectToDatabase() {

        $host = "localhost";
        $databaseName = "spartansnacks";
        $password = "";
        $username = "root";
        //To create the connection
        $connect = new mysqli($host, $username, $password, $databaseName);

        //Connection Checking, if there is a connection error, print the error
        if ($connect->connect_error) {
            exit("Failure" . $connect->connect_error);
        }

        return $connect;
    }

    //Creates a new entry to the database
    public function createObject($databaseName) {

        $query = "INSERT INTO " + $databaseName;
    }

    public function deleteObject($uuid) {
        
    }

    public function updateObject(array $keypair, $uuid, $table) {
        
    }

    public function readOject(array $keypair, $table) {
        
    }

}
