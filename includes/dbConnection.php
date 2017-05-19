    <?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 11-01-2017
 * Time: 01:15
 */

include_once 'global_config.php';

    $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

    if($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error . " |  \n");
    }

?>