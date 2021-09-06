<?php
if (isset($_POST['signup'])) {
    signup($_POST['signup']);
}else if(isset($_POST['signin'])) {
    signin($_POST['signin']);
}

?>

<?php

function signup(){
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";
    
    $con = new mysqli($servername, $username, $password, $dbname);
    
        if(!$con){
            echo "error";
        }else{            
            //2. Construct SQL statement
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phoneNumber = $_POST['phoneNumber'];

            $password = md5($password);
            //Generate Vkey
            $vkey =md5(time().$name);
    
            $sql = "INSERT INTO customer (name, email, password, phoneNumber, vkey) 
                    VALUES('$name', '$email', '$password', '$phoneNumber', '$vkey')";
        }
    
    if ($con->query($sql) === TRUE) {
        $to = $email;
        $subject = "Verify Your Email Address";
        $message = "<a href='http://localhost/MasterCliniCare/Customer/Verify.php?vkey=$vkey'></a>";
        $headers = "From: info.clinicareweb@gmail.com";
        mail($to, $subject, $message, $headers);
        echo "An email verification link has been sent to  " . $email;
        header("Location: /MasterCliniCare/Customer/Sign In Page/Sign In/signin.php");  
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
}

function signin(){
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";
    
    $mysqli = new mysqli($servername, $username, $password, $dbname);;
             $email = $mysqli->real_escape_string($_POST['email']);
             $password = $mysqli->real_escape_string($_POST['password']);
             $password = md5($password);

             $resultSet = $mysqli->query("SELECT * FROM customer WHERE email = '$email' AND password = '$password' LIMIT 1");

             if($resultSet->num_rows !=0){
                 //Process login
                 $row = $resultSet->fetch_assoc();
                 $verified = $row['verified'];
                 $email = $row['email'];

                 if($verified == 1){
                     //Continue
                     echo "Welcome to CliniCare";
                     header("Location: /MasterCliniCare/Customer/CustomerHomePage/index.html");

                 }else{
                     echo  "Please verify your account and try again.";
                 }
             }else{
                 //Invalid login
                 echo "Invalid login Credentials";
             } 
        }
?>