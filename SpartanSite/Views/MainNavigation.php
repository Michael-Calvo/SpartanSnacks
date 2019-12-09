<!--
Constructs the button links to the main navigation bar which will redirect to
different pages of the website.

author @ Badesha, Taylor
Updated: 10/25/2019
-->
<nav id ="navigation">
    <ul id="nav">
        <?php
        // sets home link location based on if the current page is index.php or not
        if (basename($_SERVER['PHP_SELF']) == 'index.php') {
            echo "<li><a href='index.php'>Home</a></li> "
               . "<li><a href='./Views/AboutIndex.php'>About</a></li>";
        } else if (basename($_SERVER['PHP_SELF']) == 'SubmissionCatcher.php'){
            echo "<li><a href='../index.php'>Home</a></li> "
               . "<li><a href='../Views/AboutIndex.php'>About</a></li>";
        }
        else {
            echo "<li><a href='../index.php'>Home</a></li> "
               . "<li><a href='./AboutIndex.php'>About</a></li>";
        }
        ?>
    </ul>
</nav>


