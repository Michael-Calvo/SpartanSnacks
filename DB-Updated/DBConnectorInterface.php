<?php
/**
 * The DBConnectorInterface interface describes the methods that must be
 * implemented for any database class that is expected to work with this system.
 * The basic CRUD operations are detailed below, but more advanced features,
 * including loading by name, uuid, id or type can be added.
 * @author Tammy Ogunkale inspired by ike Quigely
 */
interface DBConnectorInterface {
    public static function createObject($_ipAddress, $_color);
    public static function readObject();
    public static function updateObject($_ipAddress = null, $_color = null);
    public static function deleteObject($_ipAddress);
}