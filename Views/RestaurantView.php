<!-- This file is designed for viewing/displaying restaurants
after a users query 

author @ Taylor
Updated: 10/25/2019
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Styles/Stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="../Styles/RestaurantViewStyle.css" />
    </head>

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
                <!--Here we are creating a table to dynamically add restaurants to it. W also call a JavaScript function for filtering-->
                <script type="text/javascript" src="../JavaScript/RestaurantFilter.js"></script>

                <input type="text" id="userInput" onkeyup="restaurantNameFilter()" placeholder="Find restaurant by name...">

                <table id="restaurantTable">
                    <tr class="header">
                        <th style="width:25%;">Restaurant Name</th>
                        <th style="width:25%;">Website</th>
                        <th style="width:25%;">Address</th>
                        <th style="width:25%;">Phone...</th>

                    </tr>
                    <tr>
                        <td>Example Restaurant 1</td>
                        <td>whatever info we want to show here </td>
                        <td>whatever info we want to show here too etc... </td>
                    </tr>
                    <tr>
                        <td>Example Restaurant 2</td>
                        <td>whatever info we want to show here </td>
                        <td>whatever info we want to show here too etc... </td>
                    </tr>
                    <tr>
                        <td>Example Restaurant 3</td>
                        <td>whatever info we want to show here </td>
                        <td>whatever info we want to show here too etc... </td>
                    </tr>
                    <tr>
                        <td>Example Restaurant 4</td>
                        <td>whatever info we want to show here </td>
                        <td>whatever info we want to show here too etc... </td>
                    </tr>
                </table>
            </div>

    </body>
    <?php
    include 'Footer.php';
    ?>
</html>