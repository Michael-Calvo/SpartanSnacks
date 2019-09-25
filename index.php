<!DOCTYPE html>
<!--
    This page displays examples of the Zomato Class being used
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Example of the Zomato class being used
        include "Zomato.php";
        //Error will be thrown if no api key is given
        $apiKey = '';
        // Example 1:
        echo "<h2><u>Example 1: No Parameters in the url</u></h2><br>";
        //a Zomato object is created
        $zomatoRequest = new Zomato("https://developers.zomato.com/api/v2.1/search", $apiKey);
        //displaying all the data the $zomatoRequest object contains
        echo $zomatoRequest->getContent() . "<br>";
        echo "No data is displayed because nothing was searched";
        echo"<h2><u>Example 2: Parameters in the url</u></h2><br>";
        /* New url... parameters are added  and set after a question mark and multiple ones are separated by an "&".
          This search is only goint to return 3 items.
         */
        $zomatoRequest->setRequestUrl("https://developers.zomato.com/api/v2.1/search?q=Piedmont%20Triad&count=3");
        print_r($zomatoRequest->getContent());
        echo "<br>";
        //getting specific data from json array
        echo"<h2><u>Example 3: Parsing data</u></h2><br>";
        $json = $zomatoRequest->getContent();
        $resData = $json['restaurants'];
        //storing names and id's in
        $values = array('name', 'id');
        $namesIds = $zomatoRequest->jParser($resData, $values);
        //displaying array of restaurants paired with their id's
        print_r($namesIds);
        ?>
    </body>
</html>
