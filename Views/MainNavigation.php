<!--
Constructs the button links to the main navigation bar which will redirect to 
different pages of the website.

author @ Badesha, Taylor
Updated: 10/25/2019
-->
<nav id ="navigation">
    <ul id="nav">
        <?php
        // sets home link location based on if index.php or not
        if (empty($homeUrl)) {
            $homeUrl = "";
        }
        if ($homeUrl == '/index.php') {
            echo "<li><a href='index.php'>Home</a></li>";
        } else {
            echo "<li><a href='../index.php'>Home</a></li>";
        }
        ?>
        <li><a href="/Views/Aboutpage.php">About</a></li>
    </ul>    
</nav>


