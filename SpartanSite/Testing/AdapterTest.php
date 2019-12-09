<?php

/**
 * This class Tests the getRestaurantsByCIdsAndFilters() function in the RestaurantAdapter class.
 *
 * @author Isaac Taylor
 * Updated: 12/08/2018
 */
class AdapterTest {

    private $normalTestCaseOne = array("none", 1);
    private $normalTestCaseTwo = array("red", 1, 2, 4);
    private $normalTestCaseThree = array("orange", 11, 2, 5);
    private $normalTestCaseFour = array("yellow", 6, 3, 9);
    private $normalTestCaseFive = array("green", 4, 23, 33);
    private $normalTestCaseSix = array("Blue", 12, 13, 7);
    private $normalTestCaseSeven = array("", 1, 3, 5);
    private $normalTestCaseEight = array("red", 6, 27, 44);
    //private $errorCase = array("red", );
    //private $edgeCase = array("blue", );
    
    /**
     * 
     */
    public function normalCaseTestsGetRestCIDFilters() {
        $normalTests = array($this->normalTestCaseOne, $this->normalTestCaseTwo,
        $this->normalTestCaseThree, $this->normalTestCaseFour, $this->normalTestCaseFive,$this->normalTestCaseSix,
        $this->normalTestCaseSeven, $this->normalTestCaseEight);
        forEach($test as $normalTests){
            
        }
        
    }

    public function errorCaseTestGetRestCIDFilters() {
        
    }

    public function edgeCaseTestGetRestCIDFilters() {
        
    }

}
