<?php

include 'index.php';

//$mainForm = $_POST['checkboxArray'];
if (empty($mainForm)) {
    echo("You didn't select any cuisines.");
} else {
    $n = count($mainForm);

    
    for ($i = 0; $i < $n; $i++) {
        echo($mainForm[$i] . " ");
    }
}