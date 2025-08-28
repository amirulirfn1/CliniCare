<?php
session_start();

if (isset($_POST['deleteCustomer'])) {
    deleteCustomer($_POST['deleteCustomer']);
} else if (isset($_POST['editCustomer'])) {
    header("Location: ../AdminPage/dist/editCustomer.php");
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
} else if (isset($_POST['addSlot'])) {
    addSlot($_POST['addSlot']);
} else if (isset($_POST['doneApp'])) {
    doneApp($_POST['doneApp']);
} else if (isset($_POST['cancelApp'])) {
    cancelApp($_POST['cancelApp']);
}
?>

<?php
//function edit profile info
function updateProfileAdmin()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {

        $email = $_SESSION['email'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $icNumber = $_POST['icNumber'];
        $birthDate = $_POST['birthDate'];
        $address = $_POST['address'];

        $sql = "UPDATE customer SET name = '$name', address = '$address', phoneNumber = '$phoneNumber',
             icNumber = '$icNumber', birthDate = '$birthDate' WHERE email = '$email'";

        if ($con->query($sql) === TRUE) {
            header("Location: ../AdminPage/dist/profile.php");
        } else {
            echo "error";
        }
    }
}


function getCustomerInfo($email)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();
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
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $email = $_POST['emailToDelete'];
        $sql = "DELETE FROM customer WHERE email = '$email' ";
        if ($con->query($sql) === TRUE) {
            $sql2 = "DELETE FROM user WHERE email = '$email'";
            if ($con->query($sql2) === TRUE) {
                header("Location: ../AdminPage/dist/customerList.php");
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
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

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
            header("Location: ../AdminPage/dist/customerList.php");
        } else {
            echo "error";
        }
    }
}

function closeAppointment()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['appToClose'];
        $sql = "UPDATE appointmentslot SET status = 1 WHERE appSId = '$appSId' ";

        if ($con->query($sql) === TRUE) {
            header("Location: ../AdminPage/dist/appointmentSlot.php");
        } else {
            echo "error";
        }
    }
}

function openAppointment()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['appToOpen'];

        $sql = "UPDATE appointmentslot SET status = 0 WHERE appSId = '$appSId' ";

        if ($con->query($sql) === TRUE) {
            header("Location: ../AdminPage/dist/appointmentSlot.php");
        } else {
            echo "error";
        }
    }
}

function deleteSlot()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['SlotToDelete'];
        $sql = "DELETE FROM appointmentslot WHERE appSId='" . $appSId . "'";

        if ($con->query($sql) === TRUE) {
            header("Location: ../AdminPage/dist/appointmentSlot.php");
        } else {
            echo "error";
        }
    }
}

function addSlot()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $time1 = "9AM - 1PM";
        $time2 = "2PM - 6PM";
        $time3 = "7PM - 11PM";
        $date = $_POST['date'];
        $dateToday = date("Y-m-d");

        $query = mysqli_query($con, "SELECT * FROM appointmentslot WHERE date = '$date'");
        $row = mysqli_fetch_array($query);
        //if row has result then
        if ($row) {
            //show popup message
            echo "<script>alert('Slot already exist, choose another date');</script>";
            //if press ok then go to appointmentSlot.php
            echo "<script>window.location.href='../AdminPage/dist/addSlot.php';</script>";
        } else {
            if ($date < $dateToday) {
                echo "<script>alert('Date must be today or later');</script>";
                echo "<script>window.location.href='../AdminPage/dist/addSlot.php';</script>";
            } else {
                $sql = "INSERT INTO appointmentslot (date, time) VALUES ('$date', '$time1')";
                $sql2 = "INSERT INTO appointmentslot (date, time) VALUES ('$date', '$time2')";
                $sql3 = "INSERT INTO appointmentslot (date, time) VALUES ('$date', '$time3')";

                if ($con->query($sql) === TRUE && $con->query($sql2) === TRUE && $con->query($sql3) === TRUE) {
                    header("Location: ../AdminPage/dist/appointmentSlot.php");
                } else {
                    echo "error";
                }
            }
        }
    }
}

function doneApp()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $appID = $_POST['appID'];
        //update table appointment status = 0 
        $sql = "UPDATE appointment SET status = 0 WHERE appId = '$appID'";
        if ($con->query($sql) === TRUE) {
            header("Location: ../AdminPage/dist/appointmentList.php");
        } else {
            echo "error";
        }
    }
}

function cancelApp()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();

    if (!$con) {
        echo "Error";
    } else {
        $appID = $_POST['appID'];
        //update table appointment status = 2 
        $sql = "UPDATE appointment SET status = 2 WHERE appId = '$appID'";
        if ($con->query($sql) === TRUE) {
            header("Location: ../AdminPage/dist/appointmentList.php");
        } else {
            echo "error";
        }
    }
}
?>