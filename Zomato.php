<?php

/**
 * This class is a prototype that may be used for working with the Zomato API
 * 
 * @author Isaac Taylor, ...
 *  Updated: 9/21/2019
 */
class Zomato {

    private $content;
    private $requestUrl;

    const API_KEY = "KEY";
    const CITY_ID = "ID";

    /**
     * This is the constructor for a Zomato Object
     * 
     * @param $_requestUrl -  url where zomato data is being stored
     * @param $_apiKey -  required api key from zomato
     * @throws Exception when $_requestUrl or $_apiKey are empty;
     */
    function __construct($_requestUrl, $_apiKey) {
        //Checks if required parameters are empty and throws an error if they are
        if (!empty($_requestUrl) && !empty($_apiKey)) {
            $this->apiKey = $_apiKey;
            $this->setRequestUrl($_requestUrl);
        } else {
            throw new Exception("Empty Request Url and/or Empty Api Key");
        }
    }

    /**
     * This function extracts json info from the requested url and sets it as this objects content.
     */
    private function requestInfo() {
        //Initialize a CURL session to prepare for transferring data.
        $InitializerCurl = curl_init();
        //Turns on the option for returning the  contents of the url.
        curl_setopt($InitializerCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($InitializerCurl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'user-key: ' . $this->apiKey, $this->requestUrl));
        //Takes the url and passes it as a parameter to InitializerCurl.
        curl_setopt($InitializerCurl, CURLOPT_URL, $this->requestUrl);
        //Stores the the content collected from the url.
        $result = curl_exec($InitializerCurl);
        //Turns the json string result into an array an stores it in content
        //$this->content = json_decode($result, true);
        $this->content = json_decode($result);
    }

    /**
     * This function finds and returns all values found  by key in a json array.
     * 
     * @param $_content - a json array
     * @param $_requestCollection - an array of keys whose values are being requested
     * @return $results - an array containing tuples of requested keys
     */
    public function jParser($_content) {
        $results = array();
        foreach ($_content as $item) {
            $tuple = array();
            if (is_array($item)) {
                foreach ($item as $subItem) {
                    foreach ($_requestCollection as $key) {
                        if (is_array($subItem)) {
                            if (array_key_exists($key, $subItem)) {
                                array_push($tuple, $subItem[$key]);
                            }
                        }
                    }
                    array_push($results, $tuple);
                }
            }
        }
        return $results;
    }

    /**
     * This function sets the requestUrl to a new url
     * 
     * @param $_newRequestUrl - new request url where data can be found
     */
    public function setRequestUrl($_newRequestUrl) {
        if (!empty($_newRequestUrl)) {
            $this->requestUrl = $_newRequestUrl;
            $this->requestInfo();
        }
    }

//========================= GETTERS ============================================

    /**
     *  This function returns an array of commonly requested info from Zomato
     * 
     * @return type String array of common, general, queries
     */
    public function getCommonQueries() {
        return $this->commonQueries;
    }

    /**
     * This function returns a the url containing data for a Zomato object
     * 
     * @return $this->requestUrl -  the url containing this objects json data
     */
    public function getRequestUrl() {
        return $this->requestUrl;
    }

    /**
     * This function returns the json content this object is working with
     * 
     * @return $this->content -  the most recent json data this object has requested
     */
    public function getContent() {
        return $this->content;
    }

//========================= SETTERS ============================================
}
