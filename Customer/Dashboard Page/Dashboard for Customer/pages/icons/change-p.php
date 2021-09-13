<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['email'])) {

    include "db_conn.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $email = $_SESSION['email'];

        $sql = "SELECT password
                FROM customer WHERE 
                email='$email' AND password='$op'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE customer
        	          SET password='$np'
        	          WHERE email='$email'";

					  
		mysqli_query($conn, $sql_2);}
			if($conn->query($sql_2)== TRUE){
				$sql_3 = "UPDATE user
        	          SET password='$np'
        	          WHERE email='$email'";
			mysqli_query($conn, $sql_3);
			header("Location: change-password.php?success=Your password has been changed successfully");
	        exit();
  	
        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }

    }

}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: mdi.php");
     exit();
}