<?php
function updateCustomerInformation()
{
	$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
 
	if(!$con)
		{
		echo mysqli_error();
		}
	else
	{
		
		$sql= 'update customer set name="'.$_POST['name'].'", 
				numberPhone = "'.$_POST['numberPhone'].'",
				ICnumber = "'.$_POST['ICnumber'].'",
				birthDate = "'.$_POST['birthDate'].'"
				where email = "'.$_POST['email'].'"';
		
		$qry=mysqli_query($con,$sql);
		return $qry;
	}	
}






function getCustomerInformation($email)
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







function getListOfCustomer()
{
 
	$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
	
	if(!$con)
	{
		echo mysqli_error();
	}
	
	else
	{
		$sql='select * from customer';

		$qry=mysqli_query($con,$sql);
		return $qry;
	}
 }
?>




<?php

if(isSet($_POST['update']))
	{
		updateCustomerInformation();
		header( "refresh:0; url=editProfile.php");
	}
	
?>