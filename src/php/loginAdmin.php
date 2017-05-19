<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nordby
 * Date: 19-05-2017
 * Time: 01:17
 */

include("../../includes/dbConnection.php");

$username = $_POST['username'] ;
$password = $_POST['pass'];
$salt = "JyhakrLrjeyaA";

// Using prepared statements means that SQL injection is not possible.
    $sql = "SELECT * FROM accounts WHERE username = ? AND pass = ? AND account_status = 1 AND is_deleted = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

$password = hash('sha512', $password . $salt);

if ($stmt->num_rows == 1) {
    echo "Succesfully logged in as " . $username;
    header('Location: ../admin.html');
    exit;
} else {
    echo "Log in failed!";
    header('Location: ../adminLogin.html');
    exit;
}