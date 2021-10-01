<?php
$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
session_start();
$email=$_SESSION['email'];
$query=mysqli_query($con,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicine Catalogue | CliniCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">

  <!-- Favicons -->
  <link href="../../../assets/img/gambar/icon.jpeg" rel="icon">
  <link href="../../../assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: Medilab - v4.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  
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
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i
            class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i
            class="bi bi-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="#hero" class="logo me-auto"><img src="../../../assets/img/gambar/logobanner.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="/MasterCliniCare/Customer/CustomerHomePage/index.php">Home</a></li>
          <li><a href="/MasterCliniCare/Customer/CustomerHomePage/index.php">About</a></li>
          <li class="dropdown"><a href="#" class="nav-link scrollto">Services</a>
		  <ul>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Primary Care</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/checkup.php">Medical Check-Up</a></li>
				  <li><a href="/MasterCliniCare/Customer/Index Pages/services/smoking.php">Smoking Cessation</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
				  <li><a href="/MasterCliniCare/Customer/Index Pages/services/pharmacy.php">Pharmacy</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/covid.php">Covid-19 Centre</a></li>
          </ul>
		  </li>
          <li><a href="/MasterCliniCare/Customer/CustomerHomePage/index.php">Doctors</a></li>
          <li><a href="/MasterCliniCare/Customer/CustomerHomePage/index.php">FAQ</a></li>
          <li><a href="/MasterCliniCare/Customer/CustomerHomePage/index.php">Contact Us</a></li>
		  <li class="dropdown"><a href="#" class="play-btn"><span class="d-none d-md-inline">Medicine</span> <i class="bi bi-chevron-right"></i></a>
		  <ul>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/MedicineCatalogueUser.php">Medicine Catalogue</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/purchasedMedicine.php">Buy Medicine</a></li>
				  <li><a href="/MasterCliniCare/Customer/Dashboard Page/Dashboard for Customer/icons/mdi.php">Purchased Medicine</a></li>
          </ul>
		  </li>
          
		 <li class="dropdown"><a href="#" class="play-btn"><span class="d-none d-md-inline"><?php echo "Hello " . $row['name']; ?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/Profile/myProfile.php">View Profile</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/History/myHistory.php">View History</a></li>
				   <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST"><li><a><button type="submit" href="#" 
                        style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">Sign Out</button></a></li></form>
                </ul>
              </li>
		</ul>
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
            <div class="content" >
                
              <h3>Ear, Nose & Throat</h3>
			  <i><img src="gambar/Ear-Nose-Throat-icons.png"  class="center" width="280" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/Acetin.jpg" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Acetin Sachet 5g</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/med7.jpg" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Breacol Cough Syrup</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/acetylcysteinesandoz.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Acetylcysteine Sandoz 600mg Tablet</h4>
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
              <i><img src="gambar/fever.png"  class="center"  alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/Acugesic.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Acugesic 50mg Tablet.</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                   <i><img src="gambar/apo.jpg" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Apo-Sumatriptan 50mg Tablet</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/Actimax.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Actimax 500 Tablet</h4>
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
              <i><img src="gambar/pregnancy.png"  class="center" width="297" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/Appeton.jpg" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Appeton Essentials Folic Acid Tablet</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                   <i><img src="gambar/cell.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Cell Labs ProbiDefendum Sachet</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/blackmores.jpg" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Blackmores Proceive Care</h4>
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
              <i><img src="gambar/lungs.png" class="center" width="297"  height="250" alt=""></i>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/aspira.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Aspira 10mg Tablet</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                   <i><img src="gambar/Alleryl.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Alleryl 4mg/5ml Syrup</h4>
                  </div>
                </div>
				
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="gambar/anoro.png" class="img-fluid" alt=""></i>
					<br><br>
                    <h4>Anoro Ellipta 62.5/25mcg Accuhaler</h4>
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
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i
            class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i
            class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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