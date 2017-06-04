<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 10-01-2017
 * Time: 21:52
 */

include("../../includes/dbConnection.php");

$username = $_POST['username'];
$password = $_POST['pass'];

// Using prepared statements means that SQL injection is not possible.
$sql = "SELECT id, pass FROM accounts WHERE username = ? AND is_deleted = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($id, $hashedPassword);

while ($stmt->fetch()) {
    if (password_verify($password, $hashedPassword)) {
        header('Location: ../wowcasino.html');
        exit;
    }
}
// Password is not correct
// We record this attempt in the database
$now = time();
// get variables from result.
$sql = "INSERT INTO login_attempts(username, time) VALUES ('$username', '$now')";
$conn->query($sql);
header('Location: ../index.html');
exit;
