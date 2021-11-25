<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['email'])) {

	include "../db_conn.php";

	if (
		isset($_POST['op']) && isset($_POST['np'])
		&& isset($_POST['c_np'])
	) {

		function validate($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$op = validate($_POST['op']);
		$np = validate($_POST['np']);
		$c_np = validate($_POST['c_np']);

		if (empty($op)) {
			header("Location: profile.php?error=Current Password is required");
			exit();
		} else if (empty($np)) {
			header("Location: profile.php?error=New Password is required");
			exit();
		} else if ($np !== $c_np) {
			header("Location: profile.php?error=The confirmation password  does not match");
			exit();
		} else {
			// hashing the password
			$op = md5($op);
			$np = md5($np);
			$email = $_SESSION['email'];

			$sql = "SELECT password
                FROM customer WHERE 
                email='$email' AND password='$op'";

			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) === 1) {

				$sql_2 = "UPDATE customer
        	          SET password='$np'
        	          WHERE email='$email'";


				mysqli_query($cnn, $sql_2);
			}
			if ($con->query($sql_2) === TRUE) {
				$sql_3 = "UPDATE user
        	          SET password='$np'
        	          WHERE email='$email'";
				mysqli_query($con, $sql_3);
				header("Location: profile.php?success=Your password has been changed successfully");
				exit();
			} else if ($con->query($sql_2) === FALSE) {
				header("Location: profile.php?error= Current Password is incorrect");
				exit();
			}
		}
	} else {
		header("Location: profile.php");
		exit();
	}
} else {
	header("Location: profile.php");
	exit();
}
