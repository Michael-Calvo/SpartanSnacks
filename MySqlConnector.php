<?php

//Author: Mike Calvo


//These Need Values!
$dataName;
$serverName ;
$passowrd;
$username;

//To create the connection 
$connect = new mysqli($servername, $username, $password, $dataName);

//Connection Checking, if there is a connection error, print the error
if($connect->connect_error){
    exit("Failure" . $connect->connect_error);
}

//Adding values to the database. Needs values
$sql = "INSERT INTO #######
    VALUES (#####)";

//Testing to make sure the item was added. This tests and puts onto the page. 
// Create a debugger to put into a console. not page. 

if($conenct->query($sql)=== TRUE){
    echo "Sucess! Record Added!";
}else{
    echo "Whoops! ".$sql. "<br>" . $connect->error;
}
   

//Closing the Connection
$connect -> close();
