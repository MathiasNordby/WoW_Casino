<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 19-05-2017
 * Time: 13:14
 */

// Get timestamp of current time
$attempt = time();

// All login attempts are counted from the past 2 hours.
$valid_attempts = $attempt - (2 * 60 * 60);

$sql = "SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param('i', $user_id);

    // Execute the prepared query.
    $stmt->execute();
    $stmt->store_result();

    // If there have been more than 5 failed logins
    if ($stmt->num_rows > 5) {
        return true;
    } else {
        return false;
    }
}