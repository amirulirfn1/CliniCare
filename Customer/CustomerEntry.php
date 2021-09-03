<?php

    $con = mysqli_connect("localhost", "web2021", "web2021", "clinicare");
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!$con){
        echo "Not connected";
    }else{
        $sql = "select * from customer WHERE email = '$email' AND password = '$password'";
        $qry = mysqli_query($con,$sql);
        $count = mysqli_num_rows($qry);
        echo "Hello";
    }

?>