<?php
if (isset($_GET['vkey'])) {
    //Process the vkey
    $vkey = $_GET['vkey'];

    include "db_conn.php";

    $resultSet = $con->query("SELECT verified, vkey FROM customer WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if ($resultSet->num_rows == 1) {
        //validate the email address
        $update = $con->query("UPDATE customer SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if ($update) {
            header("Location: ../Alerts/successVER.php");
        } else {
            echo $mysqli->error;
        }
    } else {
        header("Location: ../Alerts/unsuccessVER.php");
    }
} else {
    die();
}
