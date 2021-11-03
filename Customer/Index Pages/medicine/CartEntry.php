<?php
session_start();
if (isset($_POST['med1'])) {
    med1($_POST['med1']);
} elseif (isset($_POST['med2'])) {
    med2($_POST['med2']);
} elseif (isset($_POST['med3'])) {
    med3($_POST['med3']);
} elseif (isset($_POST['med4'])) {
    med4($_POST['med4']);
} elseif (isset($_POST['med5'])) {
    med5($_POST['med5']);
} elseif (isset($_POST['med6'])) {
    med6($_POST['med6']);
} elseif (isset($_POST['med7'])) {
    med7($_POST['med7']);
} elseif (isset($_POST['med8'])) {
    med8($_POST['med8']);
} elseif (isset($_POST['med9'])) {
    med9($_POST['med9']);
} elseif (isset($_POST['med10'])) {
    med10($_POST['med10']);
} elseif (isset($_POST['med11'])) {
    med11($_POST['med11']);
} elseif (isset($_POST['med12'])) {
    med12($_POST['med12']);
}

?>

<?php

function med1()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '1')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med2()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '2')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med3()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '3')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med4()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '4')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med5()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '5')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med6()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '6')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med7()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '7')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med8()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '8')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med9()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '9')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med10()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '10')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med11()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '11')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

function med12()
{
    $servername = "localhost";
    $username = "clinicarecustomer";
    $password = "customer";
    $dbname = "clinicare";

    $con = new mysqli($servername, $username, $password, $dbname);

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {
        //2. Construct SQL statement
        $sql = "INSERT INTO usercart (userID, productID) VALUES ('$userID', '12')";

        if ($con->query($sql) === TRUE) {
            header("Location: MedicineCatalogueUser.php");
        } else {
            echo $userID;
        }
    }
}

?>