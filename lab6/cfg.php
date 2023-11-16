<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza = 'moja_strona';

    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(!$link) {
        die("Connection failed: " . mysqli_connect_error()); 
    }
?>