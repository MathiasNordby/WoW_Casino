<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nordby
 * Date: 08-05-2017
 * Time: 15:26
 */

include("dbConnection.php");

$id = $_POST['id'];

$sql = "UPDATE accounts SET is_deleted=1 WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() === FALSE) {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();