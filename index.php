<<<<<<< Updated upstream
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
        
        include "Zomato.php";
        include 'Restaurant.php';
        //Error will be thrown if no api key is given
        $apiKey = '';
        //a Zomato object is created
        $zomatoRequest = new Zomato("https://developers.zomato.com/api/v2.1/search?q=Piedmont%20Triad&count=9", $apiKey);
        $resData = $zomatoRequest->getContent()['restaurants'];
        $values = array('id');
        $ids = $zomatoRequest->jParser($resData, $values);
        foreach ($ids as $item) {
            $rest = new Restaurant("https://developers.zomato.com/api/v2.1/search?q=Piedmont%20Triad&count=9", $apiKey, $item[0]);
            echo $rest->getName() . "<br>";
        }
        ?>
        <?php
        ?>
    </body>
</html>
=======
<?php
$title = "Home";
$content = "Welcome to SpartanSnacks!";

include 'Template.php';


?>
>>>>>>> Stashed changes
