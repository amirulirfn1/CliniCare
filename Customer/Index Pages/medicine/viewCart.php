<?php
$con = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' ");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cart | CliniCare</title>
  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/gambar/icon.jpeg" rel="icon">
  <link href="../assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Services CSS File -->
  <link href="services.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Medilab - v4.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<style>
  .card {
    margin: auto;
    max-width: 1500px;
    width: 95%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent
  }

  @media(max-width:767px) {
    .card {
      margin: 3vh auto
    }
  }

  .cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem
  }

  @media(max-width:767px) {
    .cart {
      padding: 4vh;
      border-bottom-left-radius: unset;
      border-top-right-radius: 1rem
    }
  }

  .summary {
    background-color: #EAECEE;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65)
  }

  @media(max-width:767px) {
    .summary {
      border-top-right-radius: unset;
      border-bottom-left-radius: 1rem
    }
  }

  .summary .col-2 {
    padding: 0
  }

  .summary .col-10 {
    padding: 0
  }

  .row {
    margin: 0
  }

  .title b {
    font-size: 1.5rem
  }

  .main {
    margin: 0;
    padding: 2vh 0;
    width: 100%
  }

  .col-2,
  .col {
    padding: 0 1vh
  }

  .close {
    margin-left: auto;
    font-size: 0.7rem
  }

  .back-to-shop {
    margin-top: 4.5rem
  }

  h5 {
    margin-top: 4vh
  }

  hr {
    margin-top: 1.25rem
  }

  button {
    background-color: transparent;
    background-repeat: no-repeat;
    border: none;
    cursor: pointer;
    outline: none;
    width: 20%;

  }

  select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
  }

  input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
  }

  input:focus::-webkit-input-placeholder {
    color: transparent
  }

  .btn {
    background-color: #1977cc;
    border-color: white;
    color: white;
    width: 100%;
    font-size: 0.8rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0
  }

  .btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
  }

  .btn:hover {
    color: white
  }

  a {
    color: black
  }

  a:hover {
    color: black;
    text-decoration: none
  }

  #code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
  }
</style>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:info@clinicare.com.my">info@clinicare.com.my</a>
        <i class="bi bi-phone"></i> 03-3289 6079
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://twitter.com/klinikdamai?s=20" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="#hero" class="logo me-auto">
        <img src="../assets/img/gambar/logobanner.png" alt="" class="img-fluid">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" class="nav-link scrollto active" href="../../CustomerHomePage/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">About</a></li>
          <li class="dropdown"><a class="nav-link scrollto" href="#" class="play-btn"><span class="d-none d-md-inline">Services</span></a>
            <ul>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Primary Care</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/checkup.php">Medical Check-Up</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/smoking.php">Smoking Cessation</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/pharmacy.php">Pharmacy</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/covid.php">Covid-19 Centre</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">FAQ</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Contact Us</a></li>
          <li class="dropdown"><a class="nav-link scrollto active" href="#" class="play-btn"><span class="d-none d-md-inline">Medicine</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/MedicineCatalogueUser.php">Medicine Catalogue</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/viewCart.php">View Cart</a></li>
              <li><a href="/MasterCliniCare/Customer/Dashboard Page/Dashboard for Customer/icons/mdi.php">Purchase History</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="play-btn"><span class="d-none d-md-inline">
                <?php echo "Hello " . $row['name']; ?></span>
              <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li>
                <a href="/MasterCliniCare/Customer/Index Pages/Profile/myProfile.php">
                  View Profile</a>
              </li>

              <li>
                <a href="/MasterCliniCare/Customer/Index Pages/History/myHistory.php">
                  View History</a>
              </li>

              <li>
                <a href="/MasterCliniCare/Customer/Dashboard Page/Dashboard for Customer/icons/mdi.php">
                  Make an Appointment</a>
              </li>

              <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST">
                <li><a><button type="submit" href="#" style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">Sign Out</button></a></li>
              </form>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->


  <!-- MAIN CONTENT -->
  <main id="main">
    <br><br><br><br>


    <!-- ======= Main My Profile Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>My Cart</h2>
        </div>

        <div class="card">
          <div class="row">
            <div class="col-md-8 cart">
              <div class="title">
                <div class="row">
                  <div class="col">
                    <h4><b>Shopping Cart</b></h4>
                  </div>
                </div>
              </div>

              <?php
              //connect to database
              $con = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
              $email = $_SESSION['email'];
              $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email'");
              $row = mysqli_fetch_array($query);

              $userID = $row['userID'];
              $custname = $row['name'];
              $custphone = $row['phoneNumber'];
              $custaddress = $row['address'];

              //show all from usercart database according to userid
              $query2 = mysqli_query($con, "SELECT * FROM usercart WHERE userid = $userID");

              //while there is data in the database echo it
              while ($row2 = mysqli_fetch_array($query2)) {

                $productID = $row2['productID'];

                $query3 = mysqli_query($con, "SELECT * FROM product WHERE productID = $row2[productID]");
                $row3 = mysqli_fetch_array($query3);

                $quantity = $row2['quantity'];
                $name = $row3['name'];
                $price = $row3['price'];

                $totalQuantity += $quantity;
                $price = $price * $quantity;
                $totalPrice += $price;

                echo "<div class='row border-top border-bottom'>
                <div class='row main align-items-center'>";
                if ($productID == 1) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/Acetin.jpg'></div>";
                } else if ($productID == 2) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/med7.jpg'></div>";
                } else if ($productID == 3) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/Acetylcysteine.jpg'></div>";
                } else if ($productID == 4) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/Acugesic.png'></div>";
                } else if ($productID == 5) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/apo.jpg'></div>";
                } else if ($productID == 6) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/Actimax.jpg'></div>";
                } else if ($productID == 7) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/Appeton.jpg'></div>";
                } else if ($productID == 8) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/cell.jpg'></div>";
                } else if ($productID == 9) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/blackmores.jpg'></div>";
                } else if ($productID == 10) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/aspira.jpg'></div>";
                } else if ($productID == 11) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/Alleryl.jpg'></div>";
                } else if ($productID == 12) {
                  echo "<div class='col-2'><img class='img-fluid' src='gambar/anoro.jpg'></div>";
                }
                echo "<div class='col'>
                    <div class='col'>" . $name . "</div>
                  </div>
                  
                  <div class='col'> 
                  <form action='cartEntry.php' method='POST'>
                  <button type='submit' href='#' style='padding: 0 2vh' id='-' name='-' style='background-color: Transparent;' >-</button>
                  <input type='hidden' name='productIDToMinus' value='$productID'>             
                  <a href='#' class='border' style='padding: 0 2vh;'>" . $quantity . "</a> 
                  <button type='submit' href='#' style='padding: 0 2vh' id='+' name='+'>+</button> 
                  <input type='hidden' name='productIDToAdd' value='$productID'>   
                  </div>

                  <div class='col'>RM " . number_format((float)$price, 2, '.', '') . " </div>
                  <div class='col'><button type='submit' name='deleteMed' id='deleteMed'><span  style=color:red;>&#10005;</span></button></div>
                  </form>
                </div>
              </div>";
              }
              echo "<div class='back-to-shop'><a href='MedicineCatalogueUser.php'>&leftarrow;</a><span class='text-muted'>Back to Catalogue</span></div>
              
                      </div><div class='col-md-4 summary'>
                        <div>
                          <h5><b>Summary</b></h5>
                        </div>
                        <hr>
                        <div class='row'>
                          <div class='col' style='padding-left:0;'>Item In Cart : " . $totalQuantity . "</div>
                          
                        </div>
                        <div class='row'>
                        <div class='col' style='padding-left:0;'>Subtotal : RM " . number_format((float)$totalPrice, 2, '.', '') . "</div>
                        </div>
                        <div class='row'>
                          <div class='col' style='padding-left:0;'>Delivery Fee : RM 10.00</div>   
                        </div>
        
 
                          <form action='GenerateGatewayPaymentCall.php' method='POST'>

                            <h5><b>Details</b></h5>
                            <hr>
                          <p>Full Name</p> 
                          <input  name='custName' id='custName'  placeholder='Enter your name' required>

                          <p>Email Address</p> 
                          <input type='email'  placeholder='Enter your email address' value=".$email." required disabled>
                          <input type='hidden'  name='custEmail' id='custEmail'  placeholder='Enter your email address' value=".$email.">

                          <p>Phone Number</p> 
                          <input  name='custPhone' id='custPhone'  placeholder='Enter your phone number' required>

                          <p>Shipping Address</p> <input type='address' name='custAddress' id='custAddress'  placeholder='Enter your shipping address' required></input>
                        
                          <input type='hidden' name='userID' id='userID' value=" . $userID. ">

                          <input type='hidden' name='totalPrice' id='totalPrice' value=" . number_format((float)$totalPrice + 10, 2, '.', '') . ">
                          <div class='row' style='border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;'>
                          <div class='col'>TOTAL PRICE</div>
                          <div class='col text-right'>RM " . number_format((float)$totalPrice + 10, 2, '.', '') . " </div>
                        </div> <button type='submit' name='checkout' id='checkout' class='btn'>CHECKOUT</button>
                        </form>
                      </div>
                    </div>
                  </div>";
              ?>

    </section><!-- End Testimonials Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color : white">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>C L I N I C A R E</span>
          </strong>. All Rights Reserved
        </div>

      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/klinikdamai?s=20" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>