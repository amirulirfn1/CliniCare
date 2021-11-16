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
} elseif (isset($_POST['-'])) {
    minus($_POST['-']);
} elseif (isset($_POST['+'])) {
    add($_POST['+']);
} elseif (isset($_POST['deleteMed'])) {
    deleteMed($_POST['deleteMed']);
}

?>

<?php

function med1()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 1 AND userID= $userID AND status = 1");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 1) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 1 AND userID = $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: AcetinSachet5gTablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '1', '1' , '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}
function med2()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 2 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 2) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 2 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: BreacolCoughSyrup500ml.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '2', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med3()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID = 3 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 3) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 3 AND userID= $userID AND status = 1";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: AcetylcysteineSandoz20Tablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '3', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med4()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 4 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 4) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 4 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: Acugesic50mgTablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '4', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med5()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 5 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 5) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 5 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: Apo-Sumatriptan50mgTablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '5', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med6()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 6 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 6) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 6 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: Actimax500Tablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '6', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med7()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 7 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 7) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 7 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: AppetonFolicAcidTablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '7', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med8()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 8 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 8) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 8 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: CellLabsProbiDefendum.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '8', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med9()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 9 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 9) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 9 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: BlackmoresProceiveCare.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '9', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med10()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 10 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 10) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 10 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: Aspira10mgTablet.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '10', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med11()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 11 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 11) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 11 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: Alleryl5mlSyrup.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '11', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function med12()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    if (!$con) {
        echo "error";
    } else {

        $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE productID= 12 AND userID= $userID AND status = 1 ");
        $row2 = mysqli_fetch_array($query2);
        $dateToday = date("Y-m-d");

        //check row2 has a value or not
        if ($row2['productID'] == 12) {

            $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = 12 AND userID= $userID AND status = 1 ";
            //check if $sql is successful
            if (mysqli_query($con, $sql)) {
                header("Location: AnoroEllipta.php");
            } else {
                echo "error";
            }
        } else {
            $sql2 = "INSERT INTO usercart (userID, productID, quantity, date) VALUES ('$userID', '12', '1', '$dateToday')";
            //check if $sql2 is successful
            if (mysqli_query($con, $sql2)) {
                header("Location: viewCart.php");
            } else {
                echo "error";
            }
        }
    }
}

function minus()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    $productID = $_POST['productIDToMinus'];
    if (!$con) {
        echo "error";
    } else {
        //delete 1 from database
        $sql = "UPDATE usercart SET quantity = quantity - 1 WHERE productID = $productID AND userID= $userID AND status = 1 ";
        //check if $sql is successful
        if (mysqli_query($con, $sql)) {
            //refresh page
            header("Location: viewCart.php");
        } else {
            echo "error";
        }
    }
}

function add()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    $productID = $_POST['productIDToMinus'];
    if (!$con) {
        echo "error";
    } else {
        //delete 1 from database
        $sql = "UPDATE usercart SET quantity = quantity + 1 WHERE productID = $productID AND userID= $userID AND status = 1 ";
        //check if $sql is successful
        if (mysqli_query($con, $sql)) {
            //refresh page
            header("Location: viewCart.php");
        } else {
            echo "error";
        }
    }
}

function deleteMed()
{
    include "../../db_conn.php";

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
    $row = mysqli_fetch_array($query);

    $userID = $row['userID'];
    $productID = $_POST['productIDToMinus'];
    if (!$con) {
        echo "error";
    } else {
        //delete 1 from database
        $sql = "DELETE FROM usercart  WHERE productID = $productID AND userID= $userID AND status = 1 ";
        //check if $sql is successful
        if (mysqli_query($con, $sql)) {
            //refresh page
            header("Location: viewCart.php");
        } else {
            echo "error";
        }
    }
}

?>