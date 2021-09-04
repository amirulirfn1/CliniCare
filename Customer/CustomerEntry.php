<?php
session_start();

if(isSet($_POST['register'])){
    register($_POST);
}else if(isSet($_POST['signin'])){
    signin($_POST);
}else if(isSet($_POST['signoutout'])){
    signout($_POST);
}
?>

<?php

    function signin(){
        $con = mysqli_connect("localhost", "web2021", "web2021", "clinicare");
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!$con){
            echo "Not connected";
        }else{
            $sql = "select * from customer WHERE email = '$email' AND password = '$password'";
            $qry = mysqli_query($con,$sql);
            $count = mysqli_num_rows($qry);
            
            echo "<script type='text/javascript'>
            alert('Log Masuk Berjaya');
            window.location.href = '/MasterCliniCare/Customer/CustomerHomePage/index.html'
            </script>";
        }   
    }

    function signout(){
        $con = mysqli_connect("localhost", "web2021", "web2021", "clinicare");
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!$con){
            echo "Not connected";
        }else{
            $sql = "select * from customer WHERE email = '$email' AND password = '$password'";
            $qry = mysqli_query($con,$sql);
            $count = mysqli_num_rows($qry);
            echo "Hello"; 
        }
    
    }

    function register(){
        $con = mysqli_connect("localhost", "web2021", "web2021", "clinicare");
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(!$con){
            echo "Not connected";
        }else{
            $sql = "select * from customer WHERE email = '$email' AND password = '$password'";
            $qry = mysqli_query($con,$sql);
            $count = mysqli_num_rows($qry);
            echo "Hello"; 
        }
    
    }

    /*function verify(){
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
    }*/
?>