<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nordby
 * Date: 05-05-2017
 * Time: 00:44
 */

include("dbConnection.php");

//SELECT * ACCOUNTS
//Prepare SQL statement for execution
$sql = "SELECT * FROM accounts WHERE is_deleted = 1";
$stmt = $conn->prepare($sql);

$array = array();
$i = 0;

if($stmt->execute() === TRUE) {
    /* Get the result */
    $result = $stmt->get_result();

    while ($row[$i] = $result -> fetch_assoc()) {
        $row_array['data'] = $row[$i++];
        //Each time there's added data from $row array it pushes the array into the final $array to amke it dynamic.
        array_push($array,$row_array);
    }
} else {
    echo "Error on loading all accounts ";
}

/*
 * Creates the JSON syntax so Javascript can handle the data
 */
$result = json_encode($array);

echo $result;

$stmt->close();
$conn->close();