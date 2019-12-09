<?php

/**
 * This is an API that works through the Zomato service.
 *
 * @author Isaac Taylor
 *  Updated: 12/08/2019
 */
class ZomatoAPI {

    private const API_KEY = 'cf64d9f9aa1cd2e3b7c5bbf60f896a44';
    //Piedmont Triad
    private const CITY_ID = 904;
    //Greensboro subzone id & latitude and longitude
    private const ENTITY_TYPE = "subzone&lat";
    private const SUBZONE_ID = 133765;
    // maximum rating a restaurant can have
    private const MAX_RATING = 5;
    private const CUISINE_URL = 'https://developers.zomato.com/api/v2.1/cuisines?city_id=' . self::CITY_ID . "";
    private const RESTAURANT_REQUEST_URL = "https://developers.zomato.com/api/v2.1/search?entity_id=";
    //using associative array for enum like behavior for ratings
    private const RATINGS = array ("5/5 only" => self::MAX_RATING, "4/5 or better" => 4, "3/5 or better" => 3, "2/5 or better" => 2,
        "Any Rating" => 1);

    private static $requestUrl;
    private static $content;

    /**
     * This is the constructor for a ZomatoAPI
     *
     * @throws Exception when the CUISINE_URL or API_KEY is empty;

     */
    function __construct () {
        //Checks if required parameters are empty and throws an error if they are
        if  (!empty (self::CUISINE_URL) && !empty (self::API_KEY)) {
            self::setAndRequest (self::CUISINE_URL);
        } else {
            throw new Exception ("Empty Request Url and/or Empty Api Key");
        }
    }

    /**
     * This function recursively finds and returns a value by key in an array
     *
     * @param string $_key - the key
     * @param array $_content  - an array of restaurant data
     * @return array|string - the value if found
     */
    public function jParser ($_key, $_content) {
        foreach  ($_content as $currentKey => $value) {
            if  ($currentKey == $_key) {
                return $value;
            } else if  (is_array ($value)) {
                 self::jParser ($_key, $value);
            }
        }
    }

    /**
     * This function sets the data request url
     *
     * @param string $_url - the url data will be taken from
     */
    public function setAndRequest ($_url) {
        self::$requestUrl = $_url;
        self::requestInfo ();
    }

    /**
     * This function extracts json info from the requested url and sets it as this objects content.
     */
    private static function requestInfo () {
        //Initialize a CURL session to prepare for transferring data.
        $InitializerCurl = curl_init ();
        //Turns on the option for returning the  contents of the url.
        curl_setopt ($InitializerCurl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt ($InitializerCurl, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'user-key: ' . self::API_KEY, self::$requestUrl));
        //Takes the url and passes it as a parameter to InitializerCurl.
        curl_setopt ($InitializerCurl, CURLOPT_URL, self::$requestUrl);
        //Stores the the content collected from the url.
        $result = curl_exec ($InitializerCurl);
        //Turns the json string result into an array an stores it in content
        self::$content = json_decode ($result, true);
    }

    //========================= GETTERS ============================================

    /**
     * @return string the api key
     */
    public function getApiKey () {
        return self::API_KEY;
    }

    /**
     * @return int the city id
     */
    public function getCityId () {
        return self::CITY_ID;
    }

    /**
     * @return string Zomato entity type
     */
    public function getEntityType () {
        return self::ENTITY_TYPE;
    }

    /**
     * @return int the zomato subzone id
     */
    public function getSubzoneId () {
        return self::SUBZONE_ID;
    }

    /**
     *  @return int the maximum possible rating a restaurant may have
     */
    public function maxRating () {
        return self::MAX_RATING;
    }

    /**
     *  @return array the ratings of a user may choose
     */
    public function getRatings () {
        return self::RATINGS;
    }

    /**
     *
     * @return string the request url
     */
    public function getRequestUrl () {
        return self::$requestUrl;
    }

    /**
     *
     * @return array raw json Zomato data as an array
     */
    public function getContent () {
        return self::$content;
    }

    /**
     *
     * @return string the url containing data of cuisine types
     */
    public function getCuisineUrl () {
        return self::CUISINE_URL;
    }

     /**
     *
     * @return string the url containing data of restaurant
     */
    public function getRestaurantUrl () {
        return self::RESTAURANT_REQUEST_URL;
    }

}