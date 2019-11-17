<?php

<<<<<<< HEAD
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Mike
 */
interface DataBaseInterface {
    //put your code here
=======
/**
 *
 * @author Mike Calvo
 */
interface DataBaseInterface {
    abstract function createObject(array $keypair, $table);
    
    abstract function readOject(array $keypair, $table);
    
    public function updateObject(array $keypair, $uuid, $table);
    
    public function deleteObject($uuid);
>>>>>>> 3fde5f346f04d81101c40c961fed34b063c4e4c5
}
