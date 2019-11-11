<?php

class mySqlConnector implements DataBaseInterface{
//Author: Mike Calvo
//These Need Values!
const $dataName;
const $serverName;
const $passowrd;
const $username;
//To create the connection 
$connect = new mysqli($servername, $username, $password, $dataName);

//Connection Checking, if there is a connection error, print the error
if ($connect->connect_error) {
    exit("Failure" . $connect->connect_error);
}

public function createObject(array $keypair, $table){
    $query = "ISNERT INTO " + $table;
    $names = "(";
    $values = "VALUES (";
    
    
    
}



//Closing the Connection
$connect->close();
}