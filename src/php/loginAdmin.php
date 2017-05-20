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

// Using prepared statements means that SQL injection is not possible.
    $sql = "SELECT id, pass FROM accounts WHERE username = ? AND account_status = 1 AND is_deleted = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword);

while ($stmt->fetch()) {
    //Verify if the given hash matches the password
    if (password_verify($password, $hashedPassword)) {
        echo "Succesfully logged in as " . $username;
        header('Location: ../admin.html');
        exit;
    }  else {
        // Password is not correct
        // We record this attempt in the database
        $now = time();
        // get variables from result.
        $sql = "INSERT INTO login_attempts(username, time) VALUES ('$username', '$now')";
        $conn->query($sql);
        //header('Location: ../adminLogin.html');
        exit;
    }
}