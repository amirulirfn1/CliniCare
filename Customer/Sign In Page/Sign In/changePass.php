<?php 
session_start();

if (isset($_SESSION['reset-password']) && isset($_SESSION['email'])) {

    include "db.php";

if (isset($_POST['np']) && isset($_POST['cp'])
 {

  	function resetpassword($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	} 

	$np = $_POST['np'];
	$cp = $_POST['cp'];
    
    if(empty($np)){
      header("Location: signin.php?error=New Password is required");
	  exit();
    }else if($np !== $cp){
      header("Location: signin.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
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
			header("Location: signin.php?success=Your password has been changed successfully");
	        exit();
  	 
        }else {
        	header("Location: reset-password.php?error=Incorrect password");
	        exit();
        }

    } 

       /* function resetPassword(){
        $token = $_SESSION['resetPassToken'];      
        $email = $_SESSION['resetPass'];
        

        $np = $_POST['np'];
        $cp = $_POST['cp'];

        if(strlen($np) < 6 || strlen($cp) < 6){
            header("Location: reset-password.php?reset=invalid&token=$token");
            exit();
        }else if($np == $cp){
            $password = md5($np); // ADD MD5 LATER
            $conn = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
            if(!$conn){
                echo mysqli_error($conn);
            }else{
                //Construct SQL statement                       
                $sql = "UPDATE customer SET password='$password' WHERE email='$email'";
                if(!mysqli_query($conn, $sql)){
                    //echo mysqli_error($conn);
                    header("Location: signin.php?reset=failed");
                    exit();
                }else{
                    unset($_SESSION['resetPassToken']);
                    unset($_SESSION['resetPass']);
                    header("Location: signin.php?reset=success");
                    exit();
                }
            }  
        }else{
           header("Location: reset-password.php?reset=different&token=$token");
           exit();
        }
           
     } 

	
/*  	   function valid(){
      
      $conn = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
        if(!$conn){
            echo mysqli_error($conn);
        }else{
            //Construct SQL statement
            $token = $_SESSION['resetPassToken'];
            $email = $_SESSION['resetPass'];
            $sql = "SELECT * FROM customer WHERE email='$email' AND token='$token'";
            $qry = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($qry);        
            if($count == 1){
                return true;
            }else{
               header("Location: ../signin.php");
            }
        }
   } */  

    
 }else{
	header("Location: signin.php");
	exit();
}
 
}
 

?>