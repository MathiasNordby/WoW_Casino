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
//Binds the variables to a prepared statement as parameters ("sss" | s = string | d = double | i = integer | b = blob, send in packets
$stmt->bind_param("sss", $username, $password, $email);
