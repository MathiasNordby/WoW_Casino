<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 09-01-2017
 * Time: 19:08
 */

include("dbConnection.php");
session_start();

$page = isset($_GET['create'])?$_GET['create']:'';
if ($page=='create') {
    //CREATE ACCOUNT FROM ADMIN
//Prepare SQL statement for execution
    $stmt = $conn->prepare("INSERT INTO accounts (username, pass, email, account_status) VALUES (?,?,?,?)");
//Binds the variables to a prepared statement as parameters ("sss" | s = string | d = double | i = integer | b = blob, send in packets
    $stmt->bind_param("sssi", $username, $password, $email, $accountStatus);

    $username = $_POST['username'] ;
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $accountStatus = $_POST['account_status'];

//SQL-injection Security
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $email = stripcslashes($email);
    $accountStatus = stripcslashes($accountStatus);

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $accountStatus = mysqli_real_escape_string($conn, $accountStatus);

    if($stmt->execute() > 0 && $username !== "" && $password !== "" && $email !== "") {
        echo "Account succesfully created through admin privileges! ";
    } else {
        echo "Error on creating account through admin privileges! ";
    }

    $stmt->close();
    $conn->close();

} else if ($page=='read') {

} else if ($page=='update') {

} else if ($page=='delete') {

}