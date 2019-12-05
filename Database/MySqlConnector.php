<?php
require_once 'Database/DataStoreAdapter.php';
class mySqlConnector implements DataBaseInterface {


//Author: Mike Calvo, Ike Quigley
//Connects to the database


    public function __construct(){
        $this->connectToDatabase();
}


    function connectToDatabase() {

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
    }
    /**
     * Runs the MySQL query for saving objects to the database.
     * @param type $_NewUserSearch
     *
     */
    public function createObject($_NewUserSearch) {
        $_ID=$_NewUserSearch->getUserID();
        $_UUID=$_NewUserSearch->getUUID();
        $_color=$_NewUserSearch->getColor();
        $_sql = "INSERT INTO user VALUES ('$_ID','$_UUID,'$_color')";

        if (self::$conn->query($sql) === TRUE) {

            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . self::$conn->error;
        }

    }

    /**
     * Runs the MySQL for reading objects from the database.
     */
     public function readOject() {
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

    /**
     * Runs the MySQL query for deleting objects from the database.
     * @param type $_NewUserSearch
     */
    public static function deleteObject($_NewUserSearch) {
        $User_ID = $_NewUserSearch->getUserID();
        $sql = "DELETE FROM user WHERE id = '$User_ID'";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }

    }



}
