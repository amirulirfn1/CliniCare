<?php
session_start();

if(isset($_POST['deleteCustomer']))
{
    deleteCustomer($_POST['deleteCustomer']);
}

else if(isset($_POST['editCustomer']))
{
    header ("Location: /MasterCliniCare/stisla-2.2.0/dist/Edit-Customer.php");

}

else if(isSet($_POST['updateStaffButton']))
{
	updateProfileAdmin($_POST['updateProfileAdmin']);
}

else if(isSet($_POST['closeAppointment']))
{
	closeAppointment($__POST['closeAppointment']);
}

else if(isSet($_POST['openAppointment']))
{
	openAppointment($__POST['openAppointment']);
}

?>


<?php

function deleteCustomer(){
        $servername = "localhost";
        $username = "clinicarecustomer";
        $password = "customer";
        $dbname = "clinicare";

        $con = new mysqli($servername, $username, $password, $dbname);

        if(!$con)
		{
            echo "Error";
        }
		
		else
		{
            $email = $_POST['emailToDelete'];
            
            $sql = "DELETE FROM customer WHERE email = '$email' ";

                    if ($con->query($sql) === TRUE) 
					{
                        header("Location: /MasterCliniCare/stisla-2.2.0/dist/Customer-List.php");
                    } 
					
					else
					{
                        echo "error";
                    }
		}
}

function updateProfileAdmin()
{

        $servername = "localhost";
        $username = "clinicarecustomer";
        $password = "customer";
        $dbname = "clinicare";

        $con = new mysqli($servername, $username, $password, $dbname);

        if(!$con)
		{
            echo "Error";
        }
		
		else
		{

            $email = $_SESSION['email'];

            $name = $_POST['name'];
            $phoneNumber = $_POST['phoneNumber'];
            $icNumber = $_POST['icNumber'];
            $birthDate = $_POST['birthDate'];
            /* $address = $_POST['address']; */

            /* $password = md5($password); */

            $sql = "UPDATE customer SET name = '$name', phoneNumber = '$phoneNumber',
             icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

                    if ($con->query($sql) === TRUE) 
					{
                        header("Location: /MasterCliniCare/stisla-2.2.0/dist/Customer-List.php");
                    } 
					
					else
					{
                        echo "error";
                    }
    
		}
}   

function closeAppointment(){

    $servername = "localhost";
        $username = "clinicarecustomer";
        $password = "customer";
        $dbname = "clinicare";

        $con = new mysqli($servername, $username, $password, $dbname);

        if(!$con)
		{
            echo "Error";
        }
		
		else
		{
            $appSId = $_POST['appToClose'];
            
            $sql = "UPDATE appointmentslot SET status = 1 WHERE appSId = '$appSId' ";

                    if ($con->query($sql) === TRUE) 
					{
                        header("refresh:0; url=dist/All-Appointment-Slot.php");
                    } 
					
					else
					{
                        echo "error";
                    }
		}
}

function openAppointment(){

    $servername = "localhost";
        $username = "clinicarecustomer";
        $password = "customer";
        $dbname = "clinicare";

        $con = new mysqli($servername, $username, $password, $dbname);

        if(!$con)
		{
            echo "Error";
        }
		
		else
		{
            $appSId = $_POST['appToOpen'];
            
            $sql = "UPDATE appointmentslot SET status = 0 WHERE appSId = '$appSId' ";

                    if ($con->query($sql) === TRUE) 
					{
                        header("refresh:0; url=dist/All-Appointment-Slot.php");
                    } 
					
					else
					{
                        echo "error";
                    }
		}
}
?>