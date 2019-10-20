<!--Page1 of website or "Home page". this gives users option 
to choose cuisines and filter it to reviews and distance.

authors @ Badesha, Taylor
-->
<!DOCTYPE html>
<html>
    <!--includes head.php which includes base format of website-->
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
                        echo "Welcome to SpartanSnacks!";
                        ?> 
                        
                    </h4>
                </center>
                <center>
                    <br>
                    <div class="inline">
                        <div id="scroller" style="width:300px;height:300px;line-height:3em;overflow:auto;padding:5px;background-color:#FCFADD;color:#714D03;border:4px double #DEBB07;float:left">
                            <script type="text/javascript" src="Javascript/Animate.js"></script>
                            <!-- includes scrollby checkbox where users can click cuisines types-->
                            <form class="form-inline" method="post" name="checkForm">
                                
                                <?php
                                foreach ($cusNames as $item) {

                                    echo "
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='checkbox' id='inlineCheckbox' value='$item' name='checkboxArray[]'>
                                        <label class='form-check-label' for='inlineCheckbox'>$item</label>
                                    </div>";
                                }
                                ?>
                            </form>
                            <?php 
                                
                            /*
                              if (empty($mainForm)) {
                              echo("You didn't select any cuisines.");
                              } else {
                              $n = count($mainForm);
                              for ($i = 0; $i < $n; $i++) {
                              echo($mainForm[$i] . " ");
                              }
                              } */
                            ?>
                        </div>
                    </div>
                     <?php
                    include 'AdditionalFilters.php';
                     ?> 
                </center>
            </div>
            
            <div id="sidebar"> </div>
            
            <?php
            include 'Footer.php';
            ?>
            
        </div>    
    </body>
</html>

