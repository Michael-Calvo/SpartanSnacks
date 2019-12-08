<?php
/*
 * @author Mike Calvo, Ike Quigley
 */
interface DataBaseInterface {
    public function createObject($_NewUserSearch);

    public function readObject($_UUID);

    public function updateObject($_NewUserSearch, $_color);

    public function deleteObject($_UUID);

}
