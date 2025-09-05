<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['email'])) {

	include "../../db_conn.php";

	// Optional CSRF check if token provided
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['csrf_token'])) {
		if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
			header("Location: myProfile.php?error=Invalid CSRF token");
			exit();
		}
	}

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
			header("Location: myProfile.php?error=Current Password is required");
			exit();
		} else if (empty($np)) {
			header("Location: myProfile.php?error=New Password is required");
			exit();
		} else if ($np !== $c_np) {
			header("Location: myProfile.php?error=The confirmation password  does not match");
			exit();
		} else {
			$email = $_SESSION['email'];
			// Fetch current hash
			$stmt = $con->prepare("SELECT password FROM customer WHERE email = ? LIMIT 1");
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$res = $stmt->get_result();
			if ($res && $row = $res->fetch_assoc()) {
				$currentHash = $row['password'];
				$valid = false;
				if (password_verify($op, $currentHash)) {
					$valid = true;
				} elseif ($currentHash === md5($op) || password_verify(md5($op), $currentHash)) {
					$valid = true;
				}
				if ($valid) {
					$newHash = password_hash($np, PASSWORD_DEFAULT);
					$up = $con->prepare("UPDATE customer SET password = ? WHERE email = ?");
					$up->bind_param('ss', $newHash, $email);
					if ($up->execute()) {
						header("Location: myProfile.php?success=Your password has been changed successfully");
						exit();
					}
				}
			}
			header("Location: myProfile.php?error= Current Password is incorrect");
			exit();
		}
	} else {
		header("Location: myProfile.php");
		exit();
	}
} else {
	header("Location: myProfile.php");
	exit();
}
