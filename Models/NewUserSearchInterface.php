<?php

interface NewUserSearchInterface {
    /**
     * This function will interact with a DBConnecter to 
     * @param string $_ipAddress
     */
    public function loadById($_ipAddress);
    /**
     * 
     * @param string $_ipAddress
     * @param stromg $_color
     */
    public function save($_ipAddress, $_color);
    /**
     * 
     * @param string $_ipAddress
     */
    public function delete($_ipAddress);
    
}
