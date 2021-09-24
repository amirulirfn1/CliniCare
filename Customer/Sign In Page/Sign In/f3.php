<?php
session_start();
session_regenerate_id();
if($_SESSION['otp']==$_POST['otp']){
	 header('Location:f4.php');
}else{
	echo "bad";
}?>