<?php
/*
 * @author Mike Calvo, Ike Quigley
 */
interface DataBaseInterface {
    abstract function createObject($_ID, $_UUID,$_IP,$_COLOR);
    
    abstract function readOject();
    
    public function updateObject(array $keypair, $uuid, $table);

}
