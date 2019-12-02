<?php
include 'DBConnectorInterface.php';
/**
 * This implementation of DBConnectorInterface is for MySQL databases.
 * @author Tammy Ogunkale
 */
class MySQLConnector implements DBConnectorInterface {

    const servername = "localhost";
    const username = "root";
    const password = "";
    const dbname = "spartansnacks";
    private static $conn;

    /**
     * Initializes the connection to the database.
     */
    function __construct() {
        // Create connection
        $conn = new mysqli(self::servername, self::username, self::password, self::dbname);
        self::$conn = $conn;
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            self::$conn = $conn;
            echo "Connected successfully";
        }
    }

    /**
     * Runs the MySQL query for saving objects to the database.
     * @param type $_ipAddress
     * @param type $_color
     */
    public static function createObject($_ipAddress, $_color) {
        $sql = "INSERT INTO user VALUES ('$_ipAddress', '$_color')";

        if (self::$conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . self::$conn->error;
        }
    }

    /**
     * Runs the MySQL for reading objects from the database.
     */
    public static function readObject() {
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
    public static function updateObject($_ipAddress = null, $_color = null) {
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
     * @param type $_ipAddress
     */
    public static function deleteObject($_ipAddress) {
        $sql = "DELETE FROM user WHERE id = '$_ipAddress'";

        if (self::$conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . self::$conn->error;
        }
    }
}
