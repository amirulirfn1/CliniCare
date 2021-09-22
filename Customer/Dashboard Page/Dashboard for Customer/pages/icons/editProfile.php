<!DOCTYPE html>
<html>
<head>
    <title>Kemaskini Profil</title>
	<link rel="icon" href="../../image/LogoINTAN.png" type="image/icon type">
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--<a href = "../../MainPage/Main Page Staff/staff.php"><i class="fa fa-home" style="font-size:40px;color:black;float:left;"></i></a>-->
	<div class="container">
	 <div id="textbox">
	 
	 
<style>

h1{
	margin-right:60px;

}

body {
    background-image: url('https://mcdn.wallpapersafari.com/medium/45/76/FDOAw8.jpg');
     background-size: cover;
	 font-size: 140%;
	 text-align : center;
	 opacity:10px;

}
form {
    background-color: #ADB7C1;
        width: 40%;
		height: 600px;
        margin: 7em auto;
		margin-top:10px;
        border-radius: 1.5em;

    }
	.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
  padding: 16px 32px;
  border-radius: 1.5em;
  cursor:pointer;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

</style>
</head>


<?php
session_start();
if (!(isset($_SESSION['email']) && $_SESSION['email'] != '')) {
	header ("Location: ../../Login/Login.php");
}
include "process.php";
//include "../../Login/user.php";
$customerQry = getStaffInformation($_POST['emailToUpdate']);
$customerRecord = mysqli_fetch_assoc($qustomerQry);

$email = $_SESSION['email'];
$userInfoRow = getUserInfo($email);


echo '<h1> Kemaskini Maklumat Diri </h1>

      <form action="process.php" method="POST">
	  
      <label>Nama Penuh :</label><br>
      <input class="form-control" type="text" name="staffName" size="40" value="'.$userInfoRow['name'].'">
      <br><br>
	  
      <label>E-mel :</label><br>
	  <input class="form-control" type="text" name="email" size="40" value="'.$email.'">
      <br><br>
	  
      <label>Nombor Telefon :</label><br>
	  <input class="form-control" type="text" name="numberPhone" size="40" value="'.$userInfoRow['phoneNumber'].'">
      <br><br>
	  
      <label>Kad Pengenalan :</label><br>
      <input class="form-control" type="text" name="ICnumber" size="40" value="'.$userInfoRow['ICnumber'].'">
      <br><br>
	  
      <label>Jawatan :</label><br>
      <input class="form-control" type="text" name="Birthday" size="40" value="'.$userInfoRow['birthDate'].'">

      <br><br>
	  <input type="submit" name="update" class="button button2" value="KEMASKINI DATA"/>
    
      </form>';
?>

</html>

