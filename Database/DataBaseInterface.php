<?php
/*
 * @author Mike Calvo, Ike Quigley
 */
interface DataBaseInterface {
    public function createObject($_ID, $_UUID,$_IP,$_COLOR);
    
    public function readOject();
    
    public function updateObject(array $keypair, $uuid, $table);   
    
    public function deleteObject();

}
