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

function getUserId($con)
{
    $email = $_SESSION['email'];
    $stmt = $con->prepare("SELECT userID FROM customer WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = mysqli_fetch_array($res);
    return $row ? (int)$row['userID'] : 0;
}

function addProductToCart($productId, $redirectProductPage = null)
{
    include "../../db_conn.php";
    $userID = getUserId($con);
    if (!$userID) {
        header("Location: viewCart.php");
        return;
    }
    $dateToday = date("Y-m-d");
    // Check if product already in cart
    $stmt = $con->prepare("SELECT 1 FROM usercart WHERE productID = ? AND userID = ? AND status = 1 LIMIT 1");
    $stmt->bind_param('ii', $productId, $userID);
    $stmt->execute();
    $exists = $stmt->get_result()->fetch_row();
    if ($exists) {
        $up = $con->prepare("UPDATE usercart SET quantity = quantity + 1 WHERE productID = ? AND userID = ? AND status = 1");
        $up->bind_param('ii', $productId, $userID);
        $up->execute();
        if ($redirectProductPage) {
            header("Location: $redirectProductPage");
        } else {
            header("Location: viewCart.php");
        }
    } else {
        $ins = $con->prepare("INSERT INTO usercart (userID, productID, quantity, date) VALUES (?, ?, 1, ?)");
        $ins->bind_param('iis', $userID, $productId, $dateToday);
        $ins->execute();
        header("Location: viewCart.php");
    }
}

function med1()
{
    addProductToCart(1, 'AcetinSachet5gTablet.php');
}
function med2()
{
    addProductToCart(2, 'BreacolCoughSyrup500ml.php');
}

function med3()
{
    addProductToCart(3, 'AcetylcysteineSandoz20Tablet.php');
}

function med4()
{
    addProductToCart(4, 'Acugesic50mgTablet.php');
}

function med5()
{
    addProductToCart(5, 'Apo-Sumatriptan50mgTablet.php');
}

function med6()
{
    addProductToCart(6, 'Actimax500Tablet.php');
}

function med7()
{
    addProductToCart(7, 'AppetonFolicAcidTablet.php');
}

function med8()
{
    addProductToCart(8, 'CellLabsProbiDefendum.php');
}

function med9()
{
    addProductToCart(9, 'BlackmoresProceiveCare.php');
}

function med10()
{
    addProductToCart(10, 'Aspira10mgTablet.php');
}

function med11()
{
    addProductToCart(11, 'Alleryl5mlSyrup.php');
}

function med12()
{
    addProductToCart(12, 'AnoroEllipta.php');
}

function minus()
{
    include "../../db_conn.php";
    $userID = getUserId($con);
    $productID = (int)$_POST['productIDToMinus'];
    $stmt = $con->prepare("UPDATE usercart SET quantity = quantity - 1 WHERE productID = ? AND userID = ? AND status = 1");
    $stmt->bind_param('ii', $productID, $userID);
    $stmt->execute();
    header("Location: viewCart.php");
}

function add()
{
    include "../../db_conn.php";
    $userID = getUserId($con);
    $productID = (int)$_POST['productIDToMinus'];
    $stmt = $con->prepare("UPDATE usercart SET quantity = quantity + 1 WHERE productID = ? AND userID = ? AND status = 1");
    $stmt->bind_param('ii', $productID, $userID);
    $stmt->execute();
    header("Location: viewCart.php");
}

function deleteMed()
{
    include "../../db_conn.php";
    $userID = getUserId($con);
    $productID = (int)$_POST['productIDToMinus'];
    $stmt = $con->prepare("DELETE FROM usercart WHERE productID = ? AND userID = ? AND status = 1");
    $stmt->bind_param('ii', $productID, $userID);
    $stmt->execute();
    header("Location: viewCart.php");
}

?>
