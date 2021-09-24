<?php
$servername = "localhost";
$username = "clinicarecustomer";
$password = "customer";
$dbname = "clinicare";
$new=$_POST['new'];
$new=md5($new);
session_start();
session_regenerate_id();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `customer` SET `password`='$new' WHERE email='$_SESSION[email]'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}




if($conn->query($sql)== TRUE){
				$sql_3 = "UPDATE user
        	          SET password='$new'
        	          WHERE email='$_SESSION[email]'";
			mysqli_query($conn, $sql_3);
			header("Location: signin.php?success=Your password has been changed successfully");
	        exit();
  	 
        }else {
        	header("Location: forgot.php?error=Unsuccesfull");
	        exit();
        }

$conn->close();
?>