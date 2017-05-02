<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 02-05-2017
 * Time: 17:45
 */

//SELECT * ACCOUNTS
//Prepare SQL statement for execution
$stmt = $conn->prepare("SELECT * FROM accounts");

if($stmt->execute()) {
    echo "All accounts loaded ";
} else {
    echo "Error on loading all accounts ";
}

$stmt->close();
$conn->close();
