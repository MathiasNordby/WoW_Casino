<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 09-01-2017
 * Time: 19:08
 */

include("../../includes/dbConnection.php");


$username = $_POST['username'] ;
$password = $_POST['pass'];
$email = $_POST['email'];
$accountStatus = intval($_POST['account_status']);

//CREATE ACCOUNT FROM ADMIN
    $sql = "UPDATE accounts SET username = ?, pass = ?, email = ?, account_status = ? WHERE id = ?";
//Prepare SQL statement for execution
    $stmt = $conn->prepare($sql);
//Binds the variables to a prepared statement as parameters ("sss" | s = string | d = double | i = integer | b = blob, send in packets
    $stmt->bind_param("sssi", $username, $password, $email, $accountStatus);

    //$hash(sha512) + lav egen salt

    if($stmt->execute() > 0 && $username !== "" && $password !== "" && $email !== "" && $accountStatus === 0 || 1) {
        echo "Account succesfully created through admin privileges! ";
    } else {
        echo "Error on creating account through admin privileges! ";
    }

    $stmt->close();
    $conn->close();