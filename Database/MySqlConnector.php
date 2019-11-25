<?php

class mySqlConnector implements DataBaseInterface {

//Author: Mike Calvo
//These Need Values!
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
        echo "connection";
        return $connect;
    }

    public function createObject(array $keypair, $table) {
        $query = "ISNERT INTO " + $table;
        $names = "(";
        $values = "VALUES (";
    }

    public function deleteObject($uuid) {

    }

    public function updateObject(array $keypair, $uuid, $table) {

    }

    public function readOject(array $keypair, $table) {

    }

}
