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
  include "../../db_conn.php";
  $stmt = $con->prepare("SELECT userID FROM customer WHERE email = ?");
  $stmt->bind_param('s', $billEmail);
  $stmt->execute();
  $res = $stmt->get_result();
  $row = mysqli_fetch_array($res);
  $userID = $row['userID'];
  $dateToday = date("Y-m-d");

  //insert payment
  $ins = $con->prepare("INSERT INTO userpayment (transactionID, userID, name, email, phoneNumber, price, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $ins->bind_param('sisssii', $billpaymentInvoiceNo, $userID, $billTo, $billEmail, $billPhone, $billpaymentAmount, $billpaymentStatus);

  if ($ins->execute()) {
    //update status from database table to 0
    $up = $con->prepare("UPDATE usercart SET status = 0, date = ? WHERE userID = ? AND status = 1");
    $up->bind_param('si', $dateToday, $userID);
    if ($up->execute()) {
      header("Location:../../../Alerts/successPayment.php");
    } else {
      echo "Error updating cart status";
    }
  } else {
    echo "Error creating payment record";
  }
} else if ($billpaymentStatus == 3) {
  header("Location:../../../Alerts/unsuccessPayment.php");
} else {
  echo "pending";
}
