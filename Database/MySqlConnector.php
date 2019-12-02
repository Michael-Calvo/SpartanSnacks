<?php
require_once 'Database/DataStoreAdapter.php';
class mySqlConnector implements DataBaseInterface {

//Author: Mike Calvo, Ike Quigley
//Connects to the database
    public function connectToDatabase() {

        $host = "localhost";
        $databaseName = "spartansnacks";
        $password = " ";
        $username = "root";
        //To create the connection
        $connect = new mysqli($host, $username, $password, $databaseName);

        //Connection Checking, if there is a connection error, print the error
        if ($connect->connect_error) {
            exit("Failure" . $connect->connect_error);
        }

        return $connect;
    }

    //Creates a new entry to the database using fields of the NewUserSearch Object
    public function createObject($newUS) {
         $sql = "INSERT INTO user VALUES ('$newUS->getID()','$newUS->getUUID(),'$newUS->getIP()','$newUS->getColor()'";
         
         if (self::$conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . self::$conn->error;
        }
         
    }

    public function updateObject() {
        
    }

    public function readOject() {
        
    }

}
