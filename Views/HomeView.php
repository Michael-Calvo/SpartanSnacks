<!--Page1 of website or "Home page." This gives users the option to
choose cuisines and filter it to reviews and distance.

author @ Badesha, Taylor, , Calvo(Small Change)
-->
<!DOCTYPE html>
<html>
    <!-- includes the head.php which includes base format of website-->
    <?php
    include 'Head.php';
    ?>
    <body>
        <div id="wrapper">
            <div id="banner">
            </div>
            <!-- includes the main navigation where users clicks buttons as
            "home" or "about."
            -->

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
                    <div class="inline">

                        <script type="text/javascript" src="JavaScript/Animate.js"></script>
                        <form name="checkForm" method="post" action="Controllers/SubmissionCatcher.php"> 
                            <div id="scroller" style="width:300px;height:300px;line-height:3em;overflow:auto;padding:5px;background-color:#FCFADD;color:#714D03;border:4px double #DEBB07;float:left">
                                <?php
                                //displays a message to request that a user selects a cuisine
                                if (isset($_POST['noSelection'])) {
                                    echo "<center><font color='red'>" . $_POST['noSelection'] . "</font></center>";
                                }
                                //This code prints out checkboxes & count is used to map ids to cuisine values
                                $count = 0;
                                foreach ($cusNames as $item) {

                                    echo "
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='checkbox' id='inlineCheckbox' value='$idValues[$count]' name='checkboxArray[]'>
                                        <label class='form-check-label' for='inlineCheckbox'>$item</label>
                                    </div>";
                                    $count++;
                                }
                                ?>
                            </div>
                            <?php
                            include 'AdditionalFilters.php';
                            ?>
                        </form>

                    </div>

                </center>
            </div>
            <div id="sidebar" style="border:4px double #000000;">
             <?php
             include 'Models/Event.php';
             ?>
            </div>
            <?php
            include 'Footer.php';
            ?>
        </div>
    </body>
</html>

