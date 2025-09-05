<?php

function getCustomerInfo($email)
{
	include "../db_conn.php";

	if (!$con) {
		echo "error";
	} else {
		$stmt = $con->prepare('SELECT * FROM customer WHERE email = ?');
		$stmt->bind_param('s', $email);
		$stmt->execute();
		return $stmt->get_result();
	}
}

function updateStaffInformation()
{

	include "../db_conn.php";

	if (!$con) {
		echo "Error";
	} else {
		$sql = $con->prepare('UPDATE customer SET name = ?, phoneNumber = ?, ICnumber = ? WHERE email = ?');
		$sql->bind_param('ssss', $_POST['name'], $_POST['phoneNumber'], $_POST['ICnumber'], $_POST['email']);
		$ok = $sql->execute();
		return $ok;
	}
}
