<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 11-01-2017
 * Time: 01:15
 */

    $db_servername ="localhost";
    $db_username ="root";
    $db_password ="Kode2713";
    $db_name = "wowcasino";
    $conn = mysqli_connect($db_servername,$db_username,$db_password,$db_name);

    if($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error . " |  \n");
    }
        echo "Connected succesfully to Database |  \n";
?>