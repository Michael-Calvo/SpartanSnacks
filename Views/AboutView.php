<!-- The "About Page" framework of the website. This page explains what the website is
about and what its purpose is.

authors @ Badesha
updated 10/30/2019
-->
<!DOCTYPE html>
<html>
    <!--includes head.php which includes base format of website-->
    <?php
    include 'Head.php';
    ?>
    <body>
        <div id="wrapper">
            <div id="banner">
            </div>

            <!--includes main navigation where users clicks buttons as "home" or "about".-->
            <?php
            include 'MainNavigation.php';
            ?>
                 <center>
                    <h4 class="ml2">
                        <center>
                            What is this website?
                        </center>
                    </h4>
                </center>
                <center>
                    <br>
                        <div style="width:750px;height:350px;line-height:3em;overflow:auto;padding:5px;background-color:rgba(255, 255, 255, .5);color:#714D03;border:4px double #DEBB07;">
                        This website is a project designed to give UNCG students and Piedmont Triad residents a restaurant
                        recommendation in the Greensboro area based on the type of cuisines they want with the choice to filter
                        it through ratings and distance. Once you have chosen your desired cuisines and filters,
                        we will give you up to 20 restaurant recommendations!
                        </div>
                </center>
            <?php
            include 'Footer.php';
            ?>
        </div>
    </body>
</html>
