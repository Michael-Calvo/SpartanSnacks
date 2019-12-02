<?php
/*
 * @author Mike Calvo, Ike Quigley
 */
interface DataBaseInterface {
    abstract function createObject(array $keypair, $table);
    
    abstract function readOject(array $keypair, $table);
    
    public function updateObject(array $keypair, $uuid, $table);
    
    public function deleteObject($uuid);

}
