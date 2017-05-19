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
$salt = "s4lt";

//CREATE ACCOUNT FROM ADMIN
    $sql = "INSERT INTO accounts (username, pass, email, account_status) VALUES (?,?,?,?)";
//Prepare SQL statement for execution
    $stmt = $conn->prepare($sql);
//Binds the variables to a prepared statement as parameters ("sss" | s = string | d = double | i = integer | b = blob, send in packets

    $passwordHashed = hash('sha512', $password . $salt);

    $stmt->bind_param("sssi", $username, $passwordHashed, $email, $accountStatus);


    if($stmt->execute() > 0 && $username !== "" && $passwordHashed !== "" && $email !== "" && $accountStatus === 0 || 1) {
        echo "Account succesfully created through admin privileges! ";
    } else {
        echo "Error on creating account through admin privileges! ";
    }

    $stmt->close();
    $conn->close();