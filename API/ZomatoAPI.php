<?php
/**
 * This is an API that works through the Zomato service.
 * 
 * @author Isaac Taylor, ...
 *  Updated: 10/27/2019
 */
class ZomatoApi {

    const API_KEY = 'cf64d9f9aa1cd2e3b7c5bbf60f896a44';
    //Piedmont Triad
    const CITY_ID = 904;
    //Greensboro subzone id & latitude and longitude
    const ENTITY_TYPE = "subzone&lat";
    const SUBZONE_ID = 133765;
    const LATITUDE = 36.0863000000;
    const LONGITUDE = -79.8273000000;
    //Maximum radius in miles away from Greensboro
    const MAX_DISTANCE = 20;
    // maximum rating a restaurant can have
    const MAX_RATING = 5;
    // ratio of meters to one mile
    const MILES_AS_METERS = 1609.344;
    const CUISINE_URL = 'https://developers.zomato.com/api/v2.1/cuisines?city_id=' . self::CITY_ID . "";
    //using associative array for enum like behavior for distances in miles
    const DISTANCES = array("Within 5 miles" => 5, "Within 10 miles" => 10, "Within 15 miles" => 15,
        "Any Distance" => self::MAX_DISTANCE);
    //using associative array for enum like behavior for ratings
    const RATINGS = array("5/5 only" => self::MAX_RATING, "4/5 or better" => 4, "3/5 or better" => 3,"2/5 or better" => 2,
        "Any Rating" => 1);

    private static $requestUrl;
    private static $content;

    /**
     * This is the constructor for a ZomatoAPI
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
     * This function recursively finds and returns a value by key in an array 
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

    /**
     * This function takes sets the data request url
     * @param string $_url
     */
    public static function setAndRequest($_url) {
        self::$requestUrl = $_url;
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
