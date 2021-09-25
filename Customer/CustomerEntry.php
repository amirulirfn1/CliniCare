<?php
session_start();
if (isset($_POST['signup'])) {
    signup($_POST['signup']);
} else if (isset($_POST['signin'])) {
    signin($_POST['signin']);
} else if (isset($_POST['signout'])) {
    signout($_POST['signout']);
} else if (isset($_POST['submit-reset'])){
    $vkey = getVkey($_POST);
    mailReset($vkey);
    header("Location: /MasterCliniCare/Customer/Sign In Page/Sign In/signin.php");
    exit();
}else if (isset($_POST['reset-password'])){
    resetPassword($_POST['reset-password']);
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
                    VALUES('$name', '$email', '$password', '$phoneNumber', '$icNumber', '$birthDate', '', '$vkey' )";
                    

    }

    if ($con->query($sql) === TRUE) 
	{
        $to = $email;
        $subject = "Verify Your Email Address";
        $headers = "From: info.clinicareweb@gmail.com\r\n";
        $headers .= "MIME-Version : 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "<a href='http://localhost/MasterCliniCare/Customer/Verify.php?vkey=$vkey'>
		Click Here To Verify Your Email Address</a>";

        mail($to, $subject, $message, $headers);

        $sql2 = "INSERT INTO user (email, password, usertype)
                            VALUES('$email', '$password', 'customer')";
                            if($con->query($sql2) === TRUE)
							{
								//kalau dah successful buat sign up, keluar page ni
                                header("Location: /MasterCliniCare/Customer/Sign Up Page/Sign Up/success.php");
                            }
							
							else
							{
                                echo "Error";
								//header("Location: /MasterCliniCare/Customer/Sign Up Page/Sign Up/errorSignup.php");
                            }
    } 
	
	else 
	{
		//ni part bila email tu dah ade. duplicate
       //echo "Error: " . $sql . "<br>" . $con->error;
		header("Location: /MasterCliniCare/Customer/Sign Up Page/Sign Up/unsuccess.php");
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
                header("Location: /MasterCliniCare/Customer/CustomerHomePage/index.php");
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
    header("Location: /MasterCliniCare/index.php");
}

function getVkey(){
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

        if(!$con){
            echo mysqli_error($con);
        }else{
            //Construct SQL statement
            $email = $_POST['email'];

            $sql = "SELECT vkey FROM customer WHERE email='$email'";
            $qry = mysqli_query($con, $sql);
            $count = mysqli_num_rows($qry);
            if($count == 1){
                $userRecord = mysqli_fetch_assoc($qry);
                $_SESSION['resetPassword'] = $email;
                return $userRecord['vkey'];
            }else{
                header("Location: ../forgotPassword.php?forgot=invalid");
                exit();
            }
        }
}

function mailReset(){

        $email = $_SESSION['resetPassword'];

        $vkey = getVkey($_POST);
        $to = $email;
        $subject = "Verify Your Email Address";
        $headers = "From: info.clinicareweb@gmail.com\r\n";
        $headers .= "MIME-Version : 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "<a href='http://localhost/MasterCliniCare/Customer/Sign In Page/Sign In/resetPassword.php?vkey=$vkey'>
		Click Here To Reset Your Password</a>";

        mail($to, $subject, $message, $headers);

}
//ni yg nak reset tuu
function resetPassword(){

     $vkey = $_SESSION['resetVkey'];
     $email = $_SESSION['resetPassword'];

     $pwd = $_POST['pwd'];
     $pwdR = $_POST['pwd-repeat'];

     if(strlen($pwd)<2 || strlen($pwdR)<2){
         header("Location: /MasterCliniCare/index.php");
         exit();
     }else if($pwd == $pwdR){

         $pwd = md5($pwd);
         $con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");

         if(!$con){
            echo "error";
        }else{
            //Construct SQL statement
            $sql = "UPDATE customer SET password='$pwd' WHERE vkey='$vkey' AND email='$email'";

            if($con->query($sql)== TRUE){
				$sql2 = "UPDATE user
        	          SET password='$pwd'
        	          WHERE email='$email'";
            
            if(!mysqli_query($con, $sql2)){
                //echo mysqli_error($con);
                echo "error";
                exit();

            }else{

                unset($_SESSION['resetVkey']);
                unset($_SESSION['resetPassword']);
                header("Location: /MasterCliniCare/Customer/Sign In Page/Sign In/signin.php");
                exit();
             }
         }
     }

    }else{
       header("Location: resetpass.php?reset=different&vkey=$vkey");
       exit();
     }
    }

?>

