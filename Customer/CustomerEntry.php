<?php
session_start();
if (isset($_POST['signup'])) 
{
    signup($_POST['signup']);
} 

else if (isset($_POST['signin'])) 
{
    signin($_POST['signin']);
} 

else if (isset($_POST['signout'])) 
{
    signout($_POST['signout']);
} 

else if (isset($_POST['submit-reset']))
{
    $vkey = getVkey($_POST);
    mailReset($vkey);
    header("Location: /MasterCliniCare/Alerts/successFP.php");
    exit();
}

else if (isset($_POST['reset-password']))
{
    resetPassword($_POST['reset-password']);
}

else if(isset($_POST['update-profile']))
{
    updateProfile($_POST['update-profile']);
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

        $sql = "INSERT INTO customer (name, email, password, phoneNumber, icNumber, birthDate, address, image, vkey)  
                    VALUES('$name', '$email', '$password', '$phoneNumber', '$icNumber', '$birthDate', '','', '$vkey' )";
                    
    }

    if ($con->query($sql) === TRUE) 
	{
        $to = $email;
        $subject = "Verify Your Email Address";
        $headers = "From: info.clinicareweb@gmail.com\r\n";
        $headers .= "MIME-Version : 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $htmlContent = '<!doctype html>
        <html>
            <head>
                <meta charset=utf-8>
                <meta name=viewport content=width=device-width, initial-scale=1>
                <title>Snippet - GoSNippets</title>
                <link href=https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css rel=stylesheet>
                <link  rel=stylesheet>
                <style> 

/* CLIENT-SPECIFIC STYLES */
body,
table,
td,
a {
-webkit-text-size-adjust: 100%;
-ms-text-size-adjust: 100%;
}

table,
td {
mso-table-lspace: 0pt;
mso-table-rspace: 0pt;
}

img {
-ms-interpolation-mode: bicubic;
}

/* RESET STYLES */
img {
border: 0;
height: auto;
line-height: 100%;
outline: none;
text-decoration: none;
}

table {
border-collapse: collapse !important;
}

body {
height: 100% !important;
margin: 0 !important;
padding: 0 !important;
width: 100% !important;
background-color: #f4f4f4;
}

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}

/* MOBILE STYLES */
@media screen and (max-width:600px) {
h1 {
font-size: 32px !important;
line-height: 32px !important;
}
}

/* ANDROID CENTER FIX */
div[style*="margin: 16px 0;"] {
margin: 0 !important;
}</style>
                <script type=text/javascript ></script>
                <script type=text/javascript src=https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js></script>
                <script type=text/javascript src=https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js></script>
            </head>
            <body oncontextmenu=return false class=snippet-body>
            <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<!-- LOGO -->
<tr>
<td bgcolor="#ffffff" align="center">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" align="center" style="padding: 0px 10px 0px 10px;">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
<tr>
    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
        <h1 style="font-size: 42px; font-weight: 400; margin: 2;">Welcome, ' . $name .' !</h1> <img src="https://i.imgur.com/KGGAQuG.png" width="125" height="120" style="display: block; border: 0px;" />
    </td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ffffff" align="center" style="padding: 0px 10px 0px 10px;">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
<tr>
    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
        <p style="margin: 0;">Were excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
    </td>
</tr>
<tr>
    <td bgcolor="#ffffff" align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center" style="border-radius: 3px;" bgcolor="#e0edfb"><a href="http://localhost/MasterCliniCare/Customer/Verify.php?vkey=' .$vkey .'" target="_blank" 
                            style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #000000; text-decoration: none; color: #000000; 
                            text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #e0edfb; display: inline-block;">
                            Confirm Account</a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</tr> 

</table>
</td>
</tr>
</table>
                <script type=text/javascript></script>
            </body>
        </html>';
        //$message = "<a href='http://localhost/MasterCliniCare/Customer/Verify.php?vkey=$vkey'>
		//Click Here To Verify Your Email Address</a>";

        mail($to, $subject, $htmlContent, $headers);

        $sql2 = "INSERT INTO user (email, usertype)
                            VALUES('$email', 'customer')";
                            if($con->query($sql2) === TRUE)
							{
								//kalau dah successful buat sign up, keluar page ni
                                header("Location: /MasterCliniCare/Alerts/success.php");
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
		header("Location: /MasterCliniCare/Alerts/unsuccess.php");
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

            $sql3 = $mysqli->query("SELECT * FROM user WHERE email = '$email'");

            if ($sql3->num_rows != 0) {

                $row = $sql3->fetch_assoc();
                $usertype = $row['usertype'];

                if($usertype == "customer"){
                header("Location: /MasterCliniCare/Customer/CustomerHomePage/index.php");
                }else{
                    header("Location: /MasterClinicare/stisla-2.2.0/dist/index.php");
                }
                
            }
            //Continue
                       
        } else {
            header ("Location: /MasterClinicare/Alerts/unsuccessNVER.php");
        }
        
    } else {
        //Invalid login
        header ("Location: /MasterClinicare/Alerts/unsuccessWRONG.php");
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
                header("Location: /MasterCliniCare/Alerts/unsuccessFP.php");
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
                header("Location: /MasterCliniCare/Alerts/successRS.php");
                exit();
             }
         }
     }

    }else{
       header("Location: /MasterCliniCare/Alerts/unsuccessRS.php");
       exit();
     }
    }


//function edit profile info
function updateProfile(){

        $servername = "localhost";
        $username = "clinicarecustomer";
        $password = "customer";
        $dbname = "clinicare";

        $con = new mysqli($servername, $username, $password, $dbname);

        if(!$con){
            echo "Error";
        }else{

            $email = $_SESSION['email'];

            $name = $_POST['name'];
            $phoneNumber = $_POST['phoneNumber'];
            $icNumber = $_POST['icNumber'];
            $birthDate = $_POST['birthDate'];
            $address = $_POST['address'];

            $password = md5($password);

            $sql = "UPDATE customer SET name = '$name', address = '$address', phoneNumber = '$phoneNumber',
             icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

                    if ($con->query($sql) === TRUE) {
                        header("Location: /MasterCliniCare/Customer/Index Pages/Profile/myProfile.php");
                    } else{
                        echo "error";
                    }
    
    }
        }

?>

