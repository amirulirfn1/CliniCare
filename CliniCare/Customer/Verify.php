<?php
if (isset($_GET['vkey'])) {
    //Process the vkey
    $vkey = $_GET['vkey'];

    include "db_conn.php";

    $stmt = $con->prepare("SELECT verified, vkey FROM customer WHERE verified = 0 AND vkey = ? LIMIT 1");
    $stmt->bind_param('s', $vkey);
    $stmt->execute();
    $resultSet = $stmt->get_result();

    if ($resultSet && $resultSet->num_rows == 1) {
        //validate the email address
        $stmt2 = $con->prepare("UPDATE customer SET verified = 1 WHERE vkey = ? LIMIT 1");
        $stmt2->bind_param('s', $vkey);
        $ok = $stmt2->execute();

        if ($ok) {
            header("Location: ../Alerts/successVER.php");
            exit();
        } else {
            header("Location: ../Alerts/unsuccessVER.php");
            exit();
        }
    } else {
        header("Location: ../Alerts/unsuccessVER.php");
        exit();
    }
} else {
    die();
}
