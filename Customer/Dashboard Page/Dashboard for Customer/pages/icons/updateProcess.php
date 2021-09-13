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

    $mysqli = new mysqli($servername, $username, $password, $dbname);

	if(!$mysqli){
		echo "Error";
	}else{
		$name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phoneNumber'];
        $icNumber = $_POST['icNumber'];
        $birthDate = $_POST['birthDate'];
		$address = $_POST['address'];

		$sql= "UPDATE customer SET name = '$name', phoneNumber = '$phoneNumber', icNumber= '$icNumber',
		birthDate= '$birthDate',
		address='$address'
		where email = '$email'";

		$result = mysqli_query($mysqli, $sql);
	}

	    

		
	
	if($mysqli->query($sql) == TRUE)
		{
		echo "Your profile info is updated!";
		}
	else
	{
		echo "Error";
	}	

}
?>