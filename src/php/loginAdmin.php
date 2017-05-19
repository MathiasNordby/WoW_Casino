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
$salt = "s4lt";
$passwordHashed = hash('sha512', $password . $salt);

// Using prepared statements means that SQL injection is not possible.
    $sql = "SELECT id FROM accounts WHERE username = ? AND pass = ? AND account_status = 1 AND is_deleted = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $passwordHashed);
    $stmt->execute();
    $stmt->store_result();

if ($stmt->num_rows == 1) {
    echo "Succesfully logged in as " . $username;
    header('Location: ../admin.html');
    exit;
} else {
    // Password is not correct
    // We record this attempt in the database
    $now = time();
    // get variables from result.
    $sql = "INSERT INTO login_attempts(username, time) VALUES ('$username', '$now')";
    echo $username;
    $conn->query($sql);
    //header('Location: ../adminLogin.html');
    exit;
}