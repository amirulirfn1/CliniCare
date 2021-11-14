<?php
session_start();

if (isset($_POST['deleteCustomer'])) {
    deleteCustomer($_POST['deleteCustomer']);
} else if (isset($_POST['editCustomer'])) {
    header("Location: /MasterCliniCare/stisla-2.2.0/dist/Edit-Customer.php");
} else if (isset($_POST['closeAppointment'])) {
    closeAppointment($__POST['closeAppointment']);
} else if (isset($_POST['openAppointment'])) {
    openAppointment($__POST['openAppointment']);
} else if (isset($_POST['updateCustomer'])) {
    updateCustomer($_POST['updateCustomer']);
} else if (isset($_POST['updateProfileAdmin'])) {
    updateProfileAdmin($_POST['updateCustomer']);
} else if (isset($_POST['deleteSlot'])) {
    deleteSlot($_POST['deleteSlot']);
}else if (isset($_POST['addSlot'])) {
    addSlot($_POST['addSlot']);
}
?>


<?php

//function edit profile info
function updateProfileAdmin()
{

    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {

        $email = $_SESSION['email'];

        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $icNumber = $_POST['icNumber'];
        $birthDate = $_POST['birthDate'];
        $address = $_POST['address'];

        //$password = md5($password);

        $sql = "UPDATE customer SET name = '$name', address = '$address', phoneNumber = '$phoneNumber',
             icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

        if ($con->query($sql) === TRUE) {
            header("Location: /MasterCliniCare/stisla-2.2.0/dist/features-profile.php");
        } else {
            echo "error";
        }
    }
}


function getCustomerInfo($email)
{
    $con = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");

    if (!$con) {
        echo "error";
    } else {
        $sql = 'select * from customer where email = "' . $email . '"';
        $qry = mysqli_query($con, $sql);
        return $qry;
    }
}

function deleteCustomer()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {
        $email = $_POST['emailToDelete'];

        $sql = "DELETE FROM customer WHERE email = '$email' ";

        if ($con->query($sql) === TRUE) {
            $sql2 = "DELETE FROM user WHERE email = '$email'";
            if ($con->query($sql2) === TRUE) {
                header("Location: /MasterCliniCare/stisla-2.2.0/dist/Customer-List.php");
            } else {
                echo "error sql2";
            }
        } else {
            echo "error sql";
        }
    }
}

function updateCustomer()
{

    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {

        $email = $_POST['email'];

        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $ICnumber = $_POST['ICnumber'];
        $birthDate = $_POST['birthDate'];

        $sql = "UPDATE customer SET name = '$name', phoneNumber = '$phoneNumber',
             ICnumber = '$ICnumber', birthDate = '$birthDate 'WHERE email = '$email'";

        if ($con->query($sql) === TRUE) {
            //echo $email;
            header("Location: /MasterCliniCare/stisla-2.2.0/dist/Customer-List.php");
        } else {
            echo "error";
        }
    }
}

function closeAppointment()
{

    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['appToClose'];

        $sql = "UPDATE appointmentslot SET status = 1 WHERE appSId = '$appSId' ";

        if ($con->query($sql) === TRUE) {
            header("Location: /MasterCliniCare/stisla-2.2.0/dist/All-Appointment-Slot.php");
        } else {
            echo "error";
        }
    }
}

function openAppointment()
{

    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['appToOpen'];

        $sql = "UPDATE appointmentslot SET status = 0 WHERE appSId = '$appSId' ";

        if ($con->query($sql) === TRUE) {
            header("Location: /MasterCliniCare/stisla-2.2.0/dist/All-Appointment-Slot.php");
        } else {
            echo "error";
        }
    }
}

function deleteSlot()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['SlotToDelete'];
        $sql = "DELETE FROM appointmentslot WHERE appSId='" . $appSId . "'";

        if ($con->query($sql) === TRUE) {
            header("Location: /MasterCliniCare/stisla-2.2.0/dist/All-Appointment-Slot.php");
        } else {
            echo "error";
        }
    }
}

function addSlot()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        echo "Error";
    } else {
        $time1 = "9AM - 1PM";
        $time2 = "2PM - 6PM";
        $time3 = "7PM - 11PM";
        $date = $_POST['date'];
        
        $sql = "INSERT INTO appointmentslot (date, time, status, count) VALUES ('$date', '$time1', 0, 10)";
        $sql2 = "INSERT INTO appointmentslot (date, time, status, count) VALUES ('$date', '$time2', 0, 10)";
        $sql3 = "INSERT INTO appointmentslot (date, time, status, count) VALUES ('$date', '$time3', 0, 10)";
        
        // check sql, sql2, sql3 for success
        if ($con->query($sql) === TRUE && $con->query($sql2) === TRUE && $con->query($sql3) === TRUE) {
            header("Location: /MasterCliniCare/stisla-2.2.0/dist/All-Appointment-Slot.php");
        } else {
            echo "error";
        }
  
    }
}
?>