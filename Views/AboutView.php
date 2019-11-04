<!-- The "About Page" framework of the website. This page explains what the website is
about and what its purpose is. 

authors @ Badesha
updated 10/30/2019
-->
<!DOCTYPE html>
<html>
    <!--includes head.php which includes base format of website-->
    <?php
    $title = "About";
    ?>
    <?php
    include 'Head.php';
    ?>
    <body>
        <div id="wrapper">
            <div id="banner"></div>
            
            <!--includes main navigation where users clicks buttons as "home" or "about".-->
            <?php             
            include 'MainNavigation.php';
            ?>
            
            <div id="content_area"> 
                 <center>
                    <h4 class="ml2">
                        <?php
                        echo "What is this website?";
                        ?> 
                        
                    </h4>
                </center>
                <center>
                    <br>
                    <div class="inline">
                        
                        <?php
                        echo "This website is a project designed to give UNCG students a restaurant "
                        . "recommendation in the Piedmont Triad area based on the type of cuisines they want with the choice to filter"
                        . " it through ratings and distance. Once you have chosen your desired cuisines and filters,"
                        . " we will give you a restaurant recommendation!"
                        ?>
                        
                    </div> 
                </center>
            </div>
            
            <div id="sidebar"> </div>
            
            <?php
            include 'Footer.php';
            ?>
            
        </div>    
    </body>
</html>
