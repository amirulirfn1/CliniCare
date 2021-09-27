<?php
$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
session_start();
$email=$_SESSION['email'];
$query=mysqli_query($con,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);
?>


<!-- PAGE FOR MY PROFILE CUSTOMER -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My History | CliniCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/gambar/icon.jpeg" rel="icon">
  <link href="../assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
  
  <!-- My History CSS File -->
  <link href="history.css" rel="stylesheet">

	
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
      <a href="#hero" class="logo me-auto">
		<img src="../assets/img/gambar/logobanner.png" alt="" class="img-fluid">
	  </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../../CustomerHomePage/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">About</a></li>
          <li class="dropdown"><a href="#" class="play-btn"><span class="d-none d-md-inline">Services</span> <i class="bi bi-chevron-right"></i></a>
		  <ul>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Primary Care</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Medical Check-Up</a></li>
				  <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Smoking Cessation</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
				  <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Pharmacy</a></li>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Covid-19 Centre</a></li>
          </ul>
		  </li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">FAQ</a></li>
		  <li class="dropdown"><a href="#" class="play-btn"><span class="d-none d-md-inline">Medicine</span> <i class="bi bi-chevron-right"></i></a>
		  <ul>
                  <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/MedicineCatalogueUser.php">Medicine Catalogue</a></li>
                  <li><a href="/MasterCliniCare/Customer/Dashboard Page/Dashboard for Customer/icons/mdi.php">Buy Medicine</a></li>
				  <li><a href="/MasterCliniCare/Customer/Dashboard Page/Dashboard for Customer/icons/mdi.php">Purchased Medicine</a></li>
          </ul>
		  </li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Contact Us</a></li>
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
				  
                  <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST"><li><a><button type="submit" href="#" 
                        style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">Sign Out</button></a></li></form>
                </ul>
              </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

 
<!-- MAIN CONTENT -->  
  <main id="main">
	<br><br><br><br><br><br><br>
	
	
     <!-- ======= Main My Profile Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">
		
		<div class="section-title">
          <h2>Appointment History</h2>
          <p><strong>Disclaimer :
		  </strong> Each individual’s treatment and/or results may vary. 
		  Please consult doctor for more details.</p>
        </div>
		
        <div class="container rounded bg-white mt-5 mb-5">
		
		<div class="row">
        
		
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
			
			
			<div class="table-wrapper">
				<table class="fl-table">
				
				<thead>
					<tr>
						<th>#</th>
						<th>Services</th>
						<th>Date</th>
						<th>Status</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td>1</td>
						<td>Primary Care</td>
						<td>31/8/2021</td>
						<td>Pending</td>
					</tr>
					
					<tr>
						<td>2</td>
						<td>Primary Care</td>
						<td>24/7/2021</td>
						<td>Completed</td>
					</tr>
					
					<tr>
						<td>3</td>
						<td>Mom & Baby Care</td>
						<td>24/7/2021</td>
						<td>Cancelled</td>
					</tr>
					
					<tr>
						<td>4</td>
						<td>Medical Check-Up</td>
						<td>13/6/2021</td>
						<td>Completed</td>
					</tr>
					
					<tr>
						<td>5</td>
						<td>Medical Check-Up</td>
						<td>2/5/2021</td>
						<td>Completed</td>
					</tr>
					
					<tr>
						<td>6</td>
						<td>Medical Check-Up</td>
						<td>1/12/2020</td>
						<td>Completed</td>
					</tr>
        
					<tr>
						<td>7</td>
						<td>Pharmacy</td>
						<td>1/10/2020</td>
						<td>Completed</td>
					</tr>
				<tbody>
				</table>
			</div>
			
			</div>
        </div>
		</div>

        </div>
	   </div>
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>