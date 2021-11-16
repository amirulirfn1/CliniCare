<?php
include "../../db_conn.php";
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

  <title>Medicine Catalogue</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap.css">

  <!-- Favicons -->
  <link href="../../../assets/img/gambar/icon.jpeg" rel="icon">
  <link href="../../../assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../../../assets/css/style.css" rel="stylesheet">

</head>

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
      <a href="../../CustomerHomePage/index.php" class="logo me-auto">
        <img src="../assets/img/gambar/logobanner.png" alt="" class="img-fluid">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" class="nav-link scrollto" href="../../CustomerHomePage/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">About</a></li>
          <li class="dropdown"><a href="#" class="nav-link scrollto">Services<i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../services/primaryCare.php">Primary Care</a></li>
              <li><a href="../services/checkup.php">Medical Check-Up</a></li>
              <li><a href="../services/smoking.php">Smoking Cessation</a></li>
              <li><a href="../services/momBaby.php">Mom & Baby Care</a></li>
              <li><a href="../services/pharmacy.php">Pharmacy</a></li>
              <li><a href="../services/covid.php">Covid-19 Centre</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">FAQ</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Contact Us</a></li>
          <li class="dropdown"><a class="nav-link scrollto active" class="play-btn">Medicine<i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../medicine/MedicineCatalogueUser.php">Catalogue</a></li>
              <li><a href="../medicine/viewCart.php">View My Cart</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="play-btn"><?php echo "Hello " . $row['name']; ?><i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../Profile/myProfile.php">View Profile</a></li>
              <li><a href="../History/myHistory.php">View History</a></li>
              <li><a href="../Appointment/AppointmentSlot.php">Make an Appointment</a></li>
              <form action="../../CustomerEntry.php" method="POST">
                <li>
                  <a><button type="submit" href="#" style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">
                      Sign Out</button></a>
                </li>
              </form>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Medicine Catalogue</h1>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">

              <h3>Ear, Nose & Throat</h3>
              <br><br>
              <i><img src="gambar/Ear-Nose-Throat-icons.png" class="center" width="280" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="AcetinSachet5gTablet.php"><img src="gambar/Acetin.jpg" class="img-fluid" alt=""></a>
                    <h4>Acetin Sachet 5g Tablet</h4>
                    <h5>RM 1.70</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="BreacolCoughSyrup500ml.php"><img src="gambar/med7.jpg" class="img-fluid" alt=""></a>
                    <h4>Breacol Cough Syrup 500ml</h4>
                    <h5>RM 10.30</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="AcetylcysteineSandoz20Tablet.php"><img src="gambar/Acetylcysteine.jpg" class="img-fluid" alt=""></a>
                    <h4>Acetylcysteine Sandoz 20 Tablet</h4>
                    <h5>RM 38.00</h5>
                    <br>
                  </div>
                </div>
              </div>
            </div><!-- End content-->
          </div>
        </div>

        <br><br>

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Fever, Pain & More</h3>
              <br><br>
              <i><img src="gambar/fever.png" class="center" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="Acugesic50mgTablet.php"><img src="gambar/Acugesic.png" class="img-fluid" alt=""></a>
                    <h4>Acugesic 50mg Tablet</h4>
                    <h5>RM 15.80</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="Apo-Sumatriptan50mgTablet.php"><img src="gambar/apo.jpg" class="img-fluid" alt=""></a>
                    <h4>Apo-Sumatriptan 50mg Tablet</h4>
                    <h5>RM 40.70</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="Actimax500Tablet.php"><img src="gambar/Actimax.jpg" class="img-fluid" alt=""></a>
                    <h4>Actimax 500 <br> Tablet</h4>
                    <h5>RM 2.20</h5>
                    <br>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

        <br><br>

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Pregnancy</h3>
              <br>
              <i><img src="gambar/pregnancy.png" class="center" width="297" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="AppetonFolicAcidTablet.php"><img src="gambar/Appeton.jpg" class="img-fluid" alt=""></a>
                    <h4>Appeton Folic Acid Tablet</h4>
                    <h5>RM 43.40</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="CellLabsProbiDefendum.php"><img src="gambar/cell.jpg" class="img-fluid" alt=""></a>
                    <h4>Cell Labs ProbiDefendum</h4>
                    <h5>RM 115.20</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="BlackmoresProceiveCare.php"><img src="gambar/blackmores.jpg" class="img-fluid" alt=""></a>
                    <h4>Blackmores Proceive Care</h4>
                    <h5>RM 94.50</h5>
                    <br>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

        <br><br>

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Lungs</h3>
              <i><img src="gambar/lungs.png" class="center" width="297" height="250" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="Aspira10mgTablet.php"><img src="gambar/aspira.jpg" class="img-fluid" alt=""></a>
                    <h4>Aspira 10mg <br> Tablet</h4>
                    <h5>RM 35.00</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="Alleryl5mlSyrup.php"><img src="gambar/Alleryl.jpg" class="img-fluid" alt=""></a>
                    <h4>Alleryl 4mg/5ml Syrup</h4>
                    <h5>RM 4.00</h5>
                    <br>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <a href="AnoroEllipta.php"><img src="gambar/anoro.jpg" class="img-fluid" alt=""></a>
                    <h4>Anoro Ellipta 25mcg Accuhaler</h4>
                    <h5>RM 171.60</h5>
                    <br>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>C L I N I C A R E</span></strong>. All Rights Reserved
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
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>

</body>

</html>