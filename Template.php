<!DOCTYPE html>
<html>
    <?php
    include 'Head.php';
    ?>
    <body>
        <div id="wrapper">
            <div id="banner">                
            </div>
            <?php
            include 'MainNavigation.php';
            ?>
            <div id="content_area"> 
                <center>
                    <h4 class="ml2">
                        <?php
                        echo $content;
                        ?>  
                    </h4>
                </center>
                <center>
                    <br>
                    <div id="scroller" style="width:300px;height:300px;line-height:3em;overflow:auto;padding:5px;background-color:#FCFADD;color:#714D03;border:4px double #DEBB07;">
                        <form class="form-inline">
                            <script type="text/javascript" src="Javascript/Animate.js"></script>
                            <?php
                            include 'ViewCuisine.php';
                            //example (not actual cuisine list)
                            $listOfAllCuisines = array('African', 'American', 'Asian', 'BBQ',
                                'Bakery', 'Brazilian', 'Cafe', 'Carribbean', 'Chinese',
                                'Cuban', 'Deli', 'Desserts', 'Ethiopian', 'European',
                                'French', 'German', 'Greek', 'Indian', 'International',
                                'Italian', 'Japanese', 'Korean', 'Mediterranean', 'Mexican',
                                'Middle Eastern', 'Puerto Rican', 'Ramen', 'Seafood', 'South American',
                                'Southern', 'Sushi', 'Taco', 'Taiwanese', 'Thai', 'Vegetarian', 'Vietnamese');

                            listCuisines($listOfAllCuisines);
                            ?>

                        </form>
                    </div>
                </center>
            </div>

            <div id="sidebar"> 

            </div>

            <?php
            include 'Footer.php';
            ?>
        </div>    
    </body>
</html>

