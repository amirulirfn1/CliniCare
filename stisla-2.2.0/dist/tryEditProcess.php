<?php
include "tryEditFunction.php";


if (isset($_POST['updateStaffButton'])) {
	updateStaffInformation();
	header("refresh:0; url=Customer-List.php?msg=" . $msg);
} else {
	echo 'lain-lain';
}
