<?php
session_start();
if (isset($_POST['signup'])) {
    signup($_POST['signup']);
} else if (isset($_POST['signin'])) {
    signin($_POST['signin']);
} else if (isset($_POST['signout'])) {
    signout($_POST['signout']);
}

?>

<?php

function signup()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phoneNumber'];
        $icNumber = $_POST['icNumber'];
        $birthDate = $_POST['birthDate'];

        $password = md5($password);
        //Generate Vkey
        $vkey = md5(time() . $name);

        $sql = "INSERT INTO customer (name, email, password, phoneNumber, icNumber, birthDate, address, vkey) 
                    VALUES('$name', '$email', '$password', '$phoneNumber', '$icNumber', '$birthDate', '', '$vkey')";
                    

    }

    if ($con->query($sql) === TRUE) {
        $to = $email;
        $subject = "Verify Your Email Address";
        $headers = "From: info.clinicareweb@gmail.com\r\n";
        $headers .= "MIME-Version : 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "<a href='http://localhost/MasterCliniCare/Customer/Verify.php?vkey=$vkey'>Click Here To Verify Your Email Address</a>";

        mail($to, $subject, $message, $headers);

        $sql2 = "INSERT INTO user (email, password, usertype)
                            VALUES('$email', '$password', 'customer')";
                            if($con->query($sql2) === TRUE){
                                header("Location: /MasterCliniCare/Customer/Sign In Page/Sign In/signin.php");
                            }else{
                                echo "Error";
                            }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

function signin()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $password = md5($password);

    $resultSet = $mysqli->query("SELECT * FROM customer  WHERE email = '$email' AND password = '$password' LIMIT 1 ");



    if ($resultSet->num_rows != 0) {
        //Process login
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        $email = $row['email'];
        $_SESSION['email'] = $email;

        if ($verified == 1) {

            $sql3 = $mysqli->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

            if ($sql3->num_rows != 0) {

                $row = $sql3->fetch_assoc();
                $usertype = $row['usertype'];

                if($usertype == "customer"){
                header("Location: /MasterCliniCare/Customer/CustomerHomePage/index.html");
                }else{
                    header("Location: /MasterCliniCare/Admin/black-dashboard-master/examples/dashboard.html");
                }
                
            }
            //Continue
                       
        } else {
            echo  "Please verify your account and try again.";
        }
        
    } else {
        //Invalid login
        echo "Invalid login Credentials";
    }
    
}

function signout(){
    session_destroy();
    header("Location: /MasterCliniCare/index.html");
}
?>

