<?php
/*
 * @author Mike Calvo, Ike Quigley, , Tammy Ogunkale
 */
interface DataBaseInterface {
    public function createObject($newUserSearch);

    public function readObject();

    public function updateObject($_ipAddress = null, $_color = null);

    public function deleteObject($newUserSearch);

}
