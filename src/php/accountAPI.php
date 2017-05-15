<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 02-05-2017
 * Time: 17:45
 */

include("dbConnection.php");

//SELECT * ACCOUNTS
//Prepare SQL statement for execution
$sql = "SELECT * FROM accounts WHERE is_deleted = 0";
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
