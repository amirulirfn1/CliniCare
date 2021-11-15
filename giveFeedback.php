<?php

if (isset($_POST['btn-send'])) {
    $UserName = $_POST['UName'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Msg = $_POST['msg'];
    $txt = "Name = " . $UserName . "\r\n\r\nEmail = " . $Email . "\r\n\r\nMessage = " . $Msg;

    if (empty($UserName) || empty($Email) || empty($Subject) || empty($Msg)) {
        header('location:index.php?error');
    } else {
        $to = "info.clinicareweb@gmail.com";

        if (mail($to, $Subject, $txt)) {

            header("location:index.php?success");
        }
    }
} else {
    header("location:index.php");
}
