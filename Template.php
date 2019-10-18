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
                    <div class="inline">

                        <div id="scroller" style="width:300px;height:300px;line-height:3em;overflow:auto;padding:5px;background-color:#FCFADD;color:#714D03;border:4px double #DEBB07;float:left">
                            <script type="text/javascript" src="Javascript/Animate.js"></script>
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

                        </div>

                    </div>
<?php
include 'AdditionalFilters.php';
?>
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

