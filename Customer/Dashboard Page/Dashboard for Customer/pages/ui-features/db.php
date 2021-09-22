<?php
    $servername = "localhost";
	$username = "clinicarecustomer";
	$password = "customer";
	$dbname = "clinicare";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>