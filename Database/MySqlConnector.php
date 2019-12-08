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
        $UUID = $_NewUserSearch->getUUID();
        $color = $_NewUserSearch->getColor();
        $sql = "INSERT INTO spartandata (UUID, Color) VALUES ('$UUID', '$color')";

        if (self::$conn->query($sql) === TRUE) {

            $_UserID = self::$conn->insert_id;
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . self::$conn->error;
        }

        //Updating go counter whenever a new entry is made.
        self::updateCount();

        return $_UserID;
    }

    /**
     * Using a UUID, an element is fetched from the database and displayed. 
     */
    public function readObject($_UUID) {
        $sql = "SELECT * FROM spartandata WHERE UUID = '$_UUID'";
        $dataEntry = self::$conn->query($sql);

        if ($dataEntry->num_rows > 0) {
            while ($row = $dataEntry->fetch_assoc()) {
                echo " ID: " . $row["ID"] . " UUID: " . $row["UUID"] . " Color: " . $row["Color"] . "<br>";
            }
        } else {
            echo "Element Not Found";
        }
    }

    /**
     * Runs the MySQL query for updating objects in the database.
     * @param type $_NewUserSearch
     * @param type $_color
     */
    public function updateObject($_NewUserSearch, $_color) {
        $UUID = $_NewUserSearch->getUUID();
        $sql = "UPDATE spartandata SET Color = '$_color' WHERE UUID = '$UUID'";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . self::$conn->error;
        }
    }

    //Updates the database table for the amount of times Go is clicked.
    public function updateCount() {
        $sql = "UPDATE goCount SET count = count + 1 WHERE 1";

        if (self::$conn->query($sql) === TRUE) {
            echo "Count Record updated successfully";
        } else {
            echo "Error updating count record: " . self::$conn->error;
        }
    }

    /**
     * Runs the MySQL query for deleting objects from the database.
     * @param type $_UUID
     */
    public function deleteObject($_UUID) {
        $sql = "DELETE FROM spartandata WHERE UUID = '$_UUID'";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }
    }

}
