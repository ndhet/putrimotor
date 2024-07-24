<?php

    $mysqli = new mysqli('localhost', 'putrimotor', 'Samsung@@##123', 'putrimotor');
    if (!$mysqli) {
        die('MySQL Not Connected !' . mysqli_connect_error());
    }
    
?>