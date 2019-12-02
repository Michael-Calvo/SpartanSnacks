<?php

include 'MySQLConnector.php';

$connection = new MySQLConnector();
//$connection->createObject(24, 15, "purple");
//$connection->readObject();
//$connection->deleteObject(24);
$connection->updateObject(23, "mint");

?>

