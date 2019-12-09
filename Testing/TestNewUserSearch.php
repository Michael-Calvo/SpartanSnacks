<?php

require '../Models/NewUserSearch.php';

class NewUserTester {

    private $user;

    public function __construct() {
        
    }

    public function testSave($_arrayOfColors) {

        foreach ($_arrayOfColors as $color) {
            $this->user = new NewUserSearch($color);
            echo $retunedVal = $this->user->save();
        }
    }

}

$test = new NewUserTester();
$colors = array("red", "orange", "yellow", "green", "blue", "purple", "indigo", "teal");
$test->testSave($colors);
