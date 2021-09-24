<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Forgot Password | CliniCare</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	   <!-- Favicons -->
       <link href="images/gambar/icon.jpeg" rel="icon">
       <!-- Font Icon -->
       <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
       <!-- Main css -->
       <link rel="stylesheet" href="css/style.css">
	   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
<body>
	    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Forgot Password</h2>
                        <form method="POST" class="signin" id="login-form"
                            action="">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email Address" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="forgotPassword" class="form-submit" value="Submit" />
								
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


<?php
$servername = "localhost";
$username = "clinicarecustomer";
$password = "customer";
$dbname = "clinicare";


	// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
        }
                
	if(isset($_POST['forgotPassword'])){
    $email = $_POST['email'];
    $to = $email;
    $subject = "Reset Your Password";
    $headers = "From: info.clinicareweb@gmail.com\r\n";
    $headers .= "MIME-Version : 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = "<a href='http://localhost/MasterCliniCare/Customer/Sign In Page/Sign In/reset-password.php?token='.$token.'>Click Here To Verify Your Email Address</a>";

    mail($to, $subject, $message, $headers);
                    }

    if (mail($to, $subject,$message,$headers)){
        header("Location: /MasterCliniCare/Customer/Sign In Page/Sign In/signin.php");
    }else{
        echo "Error";
		

}
  ?>
  	<!-- function getToken(){
    $conn = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
      if(!$con){
            echo mysqli_error($conn);
        }else{
            //Construct SQL statement
            $email = $_POST['email'];

            $sql = "SELECT token FROM customer WHERE email='$email'";
            $qry = mysqli_query($con, $sql);
            $count = mysqli_num_rows($qry);        
            if($count == 1){
                $userRecord = mysqli_fetch_assoc($qry);
                $_SESSION['resetPass'] = $email;
                return $userRecord['token'];
            }else{
                header("Location: forgot-password.php?forgot=invalid");
                exit();
            }
        }
        
    } -->

	    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>