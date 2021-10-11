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

else if(isset($_POST['updateProfileAdmin']))
{
    updateProfileAdmin($_POST['updateProfileAdmin']);
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
            $email = $_POST['emailhidden'];
            
            $sql = "DELETE FROM customer WHERE email = '$email'";

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
            $address = $_POST['address'];

            $password = md5($password);

            $sql = "UPDATE customer SET name = '$name', address = '$address', phoneNumber = '$phoneNumber',
             icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

                    if ($con->query($sql) === TRUE) 
					{
                        header("Location: /MasterCliniCare/stisla-2.2.0/dist/features-profile.php");
                    } 
					
					else
					{
                        echo "error";
                    }
    
		}
}   
?>