<?php

class ZomatoApi {

    const API_KEY = 'cf64d9f9aa1cd2e3b7c5bbf60f896a44';
    const DEFAULT_CITY_ID = 904;
    const CUISINE_URL = 'https://developers.zomato.com/api/v2.1/cuisines?city_id=' . self::DEFAULT_CITY_ID;

    private static $requestUrl;
    private static $content;

    /**
     * This is the constructor for a Zomato Object
     * 
     * @throws Exception when the CUISINE_URL or API_KEY is empty;

     */
    function __construct() {
        //Checks if required parameters are empty and throws an error if they are
        if (!empty(self::CUISINE_URL) && !empty(self::API_KEY)) {
            self::setAndRequest(self::CUISINE_URL);
        } else {
            throw new Exception("Empty Request Url and/or Empty Api Key");
        }
    }

    /**
     * This function extracts json info from the requested url and sets it as this objects content.
     */
    private static function requestInfo() {
        //Initialize a CURL session to prepare for transferring data.
        $InitializerCurl = curl_init();
        //Turns on the option for returning the  contents of the url.
        curl_setopt($InitializerCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($InitializerCurl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'user-key: ' . self::API_KEY, self::$requestUrl));
        //Takes the url and passes it as a parameter to InitializerCurl.
        curl_setopt($InitializerCurl, CURLOPT_URL, self::$requestUrl);
        //Stores the the content collected from the url.
        $result = curl_exec($InitializerCurl);
        //Turns the json string result into an array an stores it in content
        self::$content = json_decode($result, true);
    }

    /**
     * This function recursively finds and returns a value by key in an array called 
     * @param type $_key - the key 
     * @param type $_content  - an array 
     * @return the value if found
     */
    public static function jParser($_key, $_content) {
        foreach ($_content as $currentKey => $value) {
            if ($currentKey == $_key) {
                return $value;
            } else if (is_array($value)) {
                self::jParser($_key, $value);
            }
        }
    }

    public static function setAndRequest($url) {
        self::$requestUrl = $url;
        self::requestInfo();
    }

    //========================= GETTERS ============================================

    public static function getRequestUrl() {
        return self::$requestUrl;
    }

    public static function getContent() {
        return self::$content;
    }

}
