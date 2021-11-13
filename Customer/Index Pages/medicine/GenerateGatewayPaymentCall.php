<?php
//payment-ebook-generate-gateway-call.php

$name=$_POST['custName'];
$email=$_POST['custEmail'];
$phoneNumber=$_POST['custPhone'];
$totalPrice=$_POST['totalPrice'];

//insert POST data ke userpayment table
//$qinsorder=sqlquery("insert into tblorder (nama, email, telefon,harga, status, tarikh) values (?,?,?,?,?,now())");
//$qinsorder->bindValue(1,$nama);
//$qinsorder->bindValue(2,$email);
//$qinsorder->bindValue(3,$telefon);
//$qinsorder->bindValue(4,$harga);
//$qinsorder->bindValue(5,0);
//$qinsorder->execute();
//get orderid
//$qgetoid=sqlquery("select id from tblorder order by id desc limit 1");
//$qgetoid->execute();
//$getoid = $qgetoid->fetch(PDO::FETCH_ASSOC);
//$oid=$getoid['id']; 
//convert RM1=100
$totalPrice=($totalPrice*100);
$some_data = array(
    'userSecretKey'=> '8qr0fm5a-ashs-hkap-yis0-rwlj81wmi2fu',
    'categoryCode'=> '8y8nt1c3',
    'billName'=> 'CliniCare Medicine Checkout',
    'billDescription'=> 'CliniCare Checkout',
    'billPriceSetting'=>1,
    'billPayorInfo'=>1,
    'billAmount'=>$totalPrice,
    'billReturnUrl'=>'http://localhost/MasterCliniCare/Customer/Index%20Pages/medicine/GenerateBillCall.php',
    'billCallbackUrl'=>'',
    'billExternalReferenceNo'=>'',
    'billTo'=>$name,
    'billEmail'=>$email,
    'billPhone'=>$phoneNumber,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>0,
  );  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result,true);
  $billcode=$obj[0]['BillCode'];

?>
<!--SEND USER TO TOYYIBPAY PAYMENT-->
<script type="text/javascript">
    //redirect to payment gateway
   window.location.href="https://dev.toyyibpay.com/<?php echo $billcode;?>"; 
 </script>
