<?php

function getStaffInformation($email)
{
	$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
	
	if(!$con)
	{
		echo mysqli_error();
	}
	
	else
	{
		$sql='select * from customer where email = "'.$email.'"';
		$qry=mysqli_query($con,$sql);
		return $qry;
	}	
}



function updateStaffInformation()
{
	
	$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");

	if(!$con)
	{
		echo mysqli_error();
	}

	else
	{
		$sql= 'update customer set name ="'.$_POST['name'].'", 
				phoneNumber="'.$_POST['phoneNumber'].'",
				ICnumber="'.$_POST['ICnumber'].'"
				where email = "'.$_POST['email'].'"';

		$qry=mysqli_query($con,$sql);
		return $qry;
	}	
}
?>