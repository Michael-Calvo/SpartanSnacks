<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TestCase {
    function createObjectTest($_expected){
        include 'MySQLConnector.php';

        $testee = new MySQLConnector();

        //TestCases:

        //Normal Test Cases
        $actual = $testee->createObject(123, purple);

        echo " expected: ".$_expected." actual: ".$actual;

        //Edge Test Cases

        //Error Test Cases
    }
}

