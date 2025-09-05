<?php
session_start();
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST["csrf_token"]) || !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
        die("Invalid CSRF token");
    }
    unset($_SESSION["csrf_token"]);
}


if (isset($_POST['deleteCustomer'])) {
    deleteCustomer($_POST['deleteCustomer']);
} else if (isset($_POST['editCustomer'])) {
    header("Location: ../AdminPage/dist/editCustomer.php");
} else if (isset($_POST['closeAppointment'])) {
    closeAppointment($_POST['closeAppointment']);
} else if (isset($_POST['openAppointment'])) {
    openAppointment($_POST['openAppointment']);
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
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {

        $email = $_SESSION['email'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $icNumber = $_POST['icNumber'];
        $birthDate = $_POST['birthDate'];
        $address = $_POST['address'];
        $stmt = $con->prepare("UPDATE customer SET name = ?, address = ?, phoneNumber = ?, icNumber = ?, birthDate = ? WHERE email = ?");
        $stmt->bind_param('ssssss', $name, $address, $phoneNumber, $icNumber, $birthDate, $email);

        if ($stmt->execute()) {
            header("Location: ../AdminPage/dist/profile.php");
        } else {
            echo "error";
        }
    }
}


function getCustomerInfo($email)
{
    include "db_conn.php";
    if (!$con) {
        echo "error";
    } else {
        $stmt = $con->prepare('SELECT * FROM customer WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result();
    }
}

function deleteCustomer()
{
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $email = $_POST['emailToDelete'];
        $stmt = $con->prepare("DELETE FROM customer WHERE email = ?");
        $stmt->bind_param('s', $email);
        if ($stmt->execute()) {
            $stmt2 = $con->prepare("DELETE FROM user WHERE email = ?");
            $stmt2->bind_param('s', $email);
            if ($stmt2->execute()) {
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
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $ICnumber = $_POST['ICnumber'];
        $birthDate = $_POST['birthDate'];

        $stmt = $con->prepare("UPDATE customer SET name = ?, phoneNumber = ?, ICnumber = ?, birthDate = ? WHERE email = ?");
        $stmt->bind_param('sssss', $name, $phoneNumber, $ICnumber, $birthDate, $email);

        if ($stmt->execute()) {
            //echo $email;
            header("Location: ../AdminPage/dist/customerList.php");
        } else {
            echo "error";
        }
    }
}

function closeAppointment()
{
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['appToClose'];
        $stmt = $con->prepare("UPDATE appointmentslot SET status = 1 WHERE appSId = ?");
        $stmt->bind_param('s', $appSId);

        if ($stmt->execute()) {
            header("Location: ../AdminPage/dist/appointmentSlot.php");
        } else {
            echo "error";
        }
    }
}

function openAppointment()
{
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['appToOpen'];
        $stmt = $con->prepare("UPDATE appointmentslot SET status = 0 WHERE appSId = ?");
        $stmt->bind_param('s', $appSId);
        if ($stmt->execute()) {
            header("Location: ../AdminPage/dist/appointmentSlot.php");
        } else {
            echo "error";
        }
    }
}

function deleteSlot()
{
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $appSId = $_POST['SlotToDelete'];
        $stmt = $con->prepare("DELETE FROM appointmentslot WHERE appSId = ?");
        $stmt->bind_param('s', $appSId);
        if ($stmt->execute()) {
            header("Location: ../AdminPage/dist/appointmentSlot.php");
        } else {
            echo "error";
        }
    }
}

function addSlot()
{
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $time1 = "9AM - 1PM";
        $time2 = "2PM - 6PM";
        $time3 = "7PM - 11PM";
        $date = $_POST['date'];
        $dateToday = date("Y-m-d");

        $stmt = $con->prepare("SELECT 1 FROM appointmentslot WHERE date = ? LIMIT 1");
        $stmt->bind_param('s', $date);
        $stmt->execute();
        $query = $stmt->get_result();
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
                $sql = $con->prepare("INSERT INTO appointmentslot (date, time) VALUES (?, ?)");
                $sql->bind_param('ss', $date, $time1);
                $ok1 = $sql->execute();
                $sql->bind_param('ss', $date, $time2);
                $ok2 = $sql->execute();
                $sql->bind_param('ss', $date, $time3);
                $ok3 = $sql->execute();

                if ($ok1 && $ok2 && $ok3) {
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
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $appID = $_POST['appID'];
        //update table appointment status = 0 
        $stmt = $con->prepare("UPDATE appointment SET status = 0 WHERE appId = ?");
        $stmt->bind_param('s', $appID);
        if ($stmt->execute()) {
            header("Location: ../AdminPage/dist/appointmentList.php");
        } else {
            echo "error";
        }
    }
}

function cancelApp()
{
    include "db_conn.php";

    if (!$con) {
        echo "Error";
    } else {
        $appID = $_POST['appID'];
        //update table appointment status = 2 
        $stmt = $con->prepare("UPDATE appointment SET status = 2 WHERE appId = ?");
        $stmt->bind_param('s', $appID);
        if ($stmt->execute()) {
            header("Location: ../AdminPage/dist/appointmentList.php");
        } else {
            echo "error";
        }
    }
}
?>
