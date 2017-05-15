<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nordby
 * Date: 05-05-2017
 * Time: 00:26
 */

include("dbConnection.php");

$id = intval($_POST['id']);
$username = $_POST['username'];
$password = $_POST['pass'];
$email = $_POST['email'];
$accountStatus = intval($_POST['account_status']);



$stmt = $conn->prepare("UPDATE accounts SET username = ?, pass = ?, email = ?, account_status = ? WHERE id = ?");
$stmt->bind_param("sssii", $username, $password, $email, $accountStatus, $id);

if ($stmt->execute() === FALSE) {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();