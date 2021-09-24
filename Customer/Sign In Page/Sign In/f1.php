<?php
$servername = "localhost";
$username = "clinicarecustomer";
$password = "customer";
$dbname = "clinicare";

$ee=$_POST['em'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email from customer where email='$ee'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	$otp = rand(100000,999999); 
  // send email and store data in session
	/* $to = $_SESSION['email'];
      $subject = "My subject";
      $txt = "Hello world!";
      $headers = "From: webmaster@example.com" . "\r\n" .
      "CC: somebodyelse@example.com"; */
     
      mail($to,$subject,$txt,$headers);
	  
   session_start();
   session_regenerate_id();
   $_SESSION['otp']=$otp;
   $_SESSION['email']=$ee;
   header('Location:f2.php');
  }
 else {
  echo "<script>alert('No email found.');window.location.href='forgot.php';</script>";
}
$conn->close();
?>