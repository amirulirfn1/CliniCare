<?php
require_once __DIR__ . '/../../app/Middleware/Auth.php';
Auth::requireRole('admin');

function getCustomerInfo($email)
{
	include "../db_conn.php";

	if (!$con) {
		echo "error";
	} else {
		$sql = 'select * from customer where email = "' . $email . '"';
		$qry = mysqli_query($con, $sql);
		return $qry;
	}
}

function updateStaffInformation()
{

	include "../db_conn.php";

	if (!$con) {
		echo "Error";
	} else {
		$sql = 'update customer set name ="' . $_POST['name'] . '", 
				phoneNumber="' . $_POST['phoneNumber'] . '",
				ICnumber="' . $_POST['ICnumber'] . '"
				where email = "' . $_POST['email'] . '"';

		$qry = mysqli_query($con, $sql);
		return $qry;
	}
}
