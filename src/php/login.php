<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 10-01-2017
 * Time: 21:52
 */

include("../../includes/dbConnection.php");

$username = $_POST['username'] ;
$password = $_POST['pass'];
$salt = "JyhakrLrjeyaA";

//SQL-injection Security
$username = stripcslashes($username);
$password = stripcslashes($password);

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$password_hashed = hash("sha512", $password);

$sql = "SELECT * FROM accounts WHERE username = '$username' and pass = '$password'";
$result = mysqli_query($conn, $sql) or die("Failed to query database");
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $username !== "" && $row['pass'] == $password && $password !== "") {
    echo "Succesfully logged in as " . $row['username'];
    header('Location: ../wowcasino.html');
    exit;
} else {
    echo "Log in failed!";
    header('Location: ../index.html');
    exit;
}
