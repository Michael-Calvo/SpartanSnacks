<?php

require_once 'Database/DataStoreAdapter.php';
require_once 'Database/DataBaseInterface.php';

class mySqlConnector implements DataBaseInterface {

//Author: Mike Calvo, Ike Quigley, Tammy Ogunkale
//Connects to the database
    const servername = "localhost";
    const username = "root";
    const password = "";
    const dbname = "spartansnacks";

    private static $conn;

    public function __construct() {
        $this->connectToDatabase();
    }
/**
 * Function to connect to the database.
 */
    function connectToDatabase() {

        $host = self::servername;
        $databaseName = self::dbname;
        $password = self::password;
        $username = self::username;
        //To create the connection
        $conn = new mysqli($host, $username, $password, $databaseName);
        self::$conn = $conn;
        echo "connection Sucessful";
        //Connection Checking, if there is a connection error, print the error
        if ($conn->connect_error) {
            exit("Failure" . $conn->connect_error);
        }
    }

    /**
     * Runs the MySQL query for saving objects to the database.
     * @param type $_NewUserSearch
     *
     * @return the User ID from the SQL database. 
     */
    public function createObject($_NewUserSearch) {
        if ($_NewUserSearch == null) {
            echo "Search is Null!";
        }
        //Grabbing the data from the new user search object.
        $_UUID = $_NewUserSearch->getUUID();
        $_color = $_NewUserSearch->getColor();
        $_sql = "INSERT INTO spartandata (UUID, Color) VALUES ('$_UUID', '$_color')";

        if (self::$conn->query($_sql) === TRUE) {
            
            $_UserID = self::$conn->insert_id;
            echo "New record created successfully";
        } else {
            echo "Error: " . $_sql . "<br>" . self::$conn->error;
        }
        
        //Updating go counter whenever a new entry is made.
        self::updateCount();
        
        return $_UserID;
    }

    /**
     * Runs the MySQL for reading objects from the database.
     */
    public function readObject() {
        $sql = "SELECT ipAddress, color FROM user";
        $result = self::$conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "ipAddress: " . $row["ipAddress"] . "color: " . $row["color"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    /**
     * Runs the MySQL query for updating objects in the database.
     * @param type $_ipAddress
     * @param type $_color
     */
    public function updateObject($_ipAddress = null, $_color = null) {
        $sql = "UPDATE gocount SET count = count + 1 WHERE id = 1";

        if (!empty($_ipAddress)) {
            $sql1 = "UPDATE user SET color = '$_color' WHERE ipAddress = '$_ipAddress'";
        }

        if (self::$conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        if (!empty($_ipAddress) && !empty($_color)) {
            if (self::$conn->query($sql1) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }

    public function updateCount() {
        $_sql = "UPDATE goCount SET count = count + 1 WHERE 1";
        if (self::$conn->query($_sql) === TRUE) {
            echo "Count Record updated successfully";
        } else {
            echo "Error updating count record: " . self::$conn->error;
        }
    }

    /**
     * Runs the MySQL query for deleting objects from the database.
     * @param type $_NewUserSearch
     */
    public function deleteObject($_NewUserSearch) {
        $User_ID = $_NewUserSearch->getUserID();
        $sql = "DELETE FROM user WHERE id = '$User_ID'";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }
    }

}
