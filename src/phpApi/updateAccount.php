<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nordby
 * Date: 05-05-2017
 * Time: 00:26
 */

include("dbConnection.php");

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['pass'];
$email = $_POST['email'];
$accountStatus = $_POST['account_status'];
$isDeleted = $_POST['is_deleted'];



$stmt = $conn->prepare("UPDATE articles SET username = ?, pass = ?, email = ?, account_status = ?, is_deleted = ? WHERE id = ?");
$stmt->bind_param("sssi", $username, $password, $email, $accountStatus, $isDeleted, $id);

if ($stmt->execute() === FALSE) {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();