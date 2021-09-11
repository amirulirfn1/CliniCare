<?php
session_start();

if (isset($_POST['updateProfile'])) {
    updateCustomerInformation($POST['updateProfile']);
	header( "refresh:1; url=mdi.php");
}
?>

<?php
function updateCustomerInformation()
{
	$servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $mysqli = new mysqli($servername, $username, $password, $dbname);;

	$name = $mysqli->real_escape_string($_POST['name']);
	$phoneNumber = $mysqli->real_escape_string($_POST['phoneNumber']);
	$icNumber = $mysqli->real_escape_string($_POST['ICNumber']);
	$birthDate = $mysqli->real_escape_string($_POST['birthDate']);
	$address = $mysqli->real_escape_string($_POST['address']);
	$email = $mysqli->real_escape_string($_POST['email']);
	
	if(!$mysqli)
		{
		echo "Error";
		}
	else
	{
		
		$sql= "UPDATE customer SET 
		name = $name, 
		phoneNumber= $phoneNumber,
		ICnumber= $icNumber,
		birthDate= $birthDate,
		address= $address
		where email = $email";
		
	}	

}
?>