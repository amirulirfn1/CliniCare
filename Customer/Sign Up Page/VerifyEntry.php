<?php
      //session_start();

      //$id = $_SESSION['id'];
      //$custname = $_SESSION['custname'];
      $con = mysqli_connect('localhost', 'web2021', 'web2021', 'clinicare');

      $sql = "SELECT * FROM customer WHERE custname = '$custname'";
      $custqry = mysqli_query($con,$sql);

      $custData = mysqli_fetch_array($custqry);
      //$custid = $custData['custid'];
      $custEmail = $custData['email'];

      //$sql2 = "UPDATE reservation SET status = '0' WHERE reservation.id = $id";
      //mysqli_query($con,$sql2);

      //$appid = substr($custid, -4).$id;

      $to_email = 'jitiv85897@mtlcz.com';
      //"$custEmail";
      $subject = "Please verify your email address ";
      $body = " Please click the link below :";
      $headers = "From: info@clinicare.com.my";
      
      //$sql3 = "delete from appointment where custid = '$custid'";
      //mysqli_query($con,$sql3);
      
      //$sql4 = "insert into appointment(id, custid, reservationid)
           // values('$appid', '$custid', '$id')";
      //mysqli_query($con,$sql4);

      //$_SESSION['appid'] = $appid;

      if (mail($to_email, $subject, $body, $headers)) {
            echo "Verified";
            //'<script>
                  //alert("Verified");
                  //window.location.href = \'/MasterCliniCare/Customer/Sign In Page/Sign In/signin.html\';            
            //</script>';
      }
      
?>