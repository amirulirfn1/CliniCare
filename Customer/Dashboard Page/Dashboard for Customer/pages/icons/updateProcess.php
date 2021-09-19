<?php
session_start();

$servername = "localhost";
$username = "clinicarecustomer";
$password = "customer";
$dbname = "clinicare";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['update_customer_data']))
{
    $email = $_POST['email'];
	
	$name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $ICnumber = $_POST['ICnumber'];
	$birthDate = $_POST['birthDate'];
    $address = $_POST['address'];

    $query = "UPDATE customer SET 
	name='$name', 
	phoneNumber='$phoneNumber', 
	ICnumber='$ICnumber', 
	birthDate='$birthDate', 
	address='$address' 
	WHERE email='$email' ";
	
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: updateForm.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: updateForm.php");
    }
}

?>