<?php

$billcode = $_GET['billcode'];
$some_data = array(
  'billCode' => $billcode,
  'billpaymentStatus' => ''
);

$curl = curl_init();

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/getBillTransactions');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);

//get value from array result
$result = json_decode($result, true);
$billpaymentStatus = $result[0]['billpaymentStatus'];
$billTo = $result[0]['billTo'];
$billEmail = $result[0]['billEmail'];
$billPhone = $result[0]['billPhone'];
$billpaymentAmount = $result[0]['billpaymentAmount'];
$billpaymentInvoiceNo = $result[0]['billpaymentInvoiceNo'];


if ($billpaymentStatus == 1) {
  //connect database connection
  require_once $_SERVER['DOCUMENT_ROOT'] . '/app/Core/Database.php';
$con = Database::getConnection();
  $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$billEmail' ");
  $row = mysqli_fetch_array($query);
  $userID = $row['userID'];
  $dateToday = date("Y-m-d");

  //update database table
  $sql = "INSERT INTO userpayment (transactionID, userID, name, email, phoneNumber, price, status) 
      VALUES ('$billpaymentInvoiceNo', '$userID', '$billTo', '$billEmail', '$billPhone', '$billpaymentAmount', '$billpaymentStatus')";

  //check if sql success
  if ($con->query($sql) === TRUE) {
    //update status from database table to 0
    $sql2 = "UPDATE usercart SET status='0', date='$dateToday' WHERE userID='$userID' AND status='1'";

    //check if sql2 success
    if ($con->query($sql2) === TRUE) {
      header("Location:../../../Alerts/successPayment.php");
    } else {
      echo "Error: " . $sql2 . "<br>" . $con->error;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }
} else if ($billpaymentStatus == 3) {
  header("Location:../../../Alerts/unsuccessPayment.php");
} else {
  echo "pending";
}
