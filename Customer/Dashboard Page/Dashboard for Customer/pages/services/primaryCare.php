<!-- PAGE UNTUK PRIMARY CARE SERVICES -->

<?php
include_once "db_conn.php";
session_start();
$email=$_SESSION['email'];
$query=mysqli_query($conn,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Primary Care - Services | CliniCare</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/gambar/icon.jpeg" />
  </head>
  
  
<body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../icons/mdi.php"><img src="../../assets/images/gambar/logobanner.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../icons/mdi.php"><img src="../../assets/images/gambar/icon.jpeg" alt="logo" /></a>
        </div>
		
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" 
		  type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
		  
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                
				<div class="nav-profile-img">
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
				
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?php echo $row['name']; ?></p>
                </div>
              </a>

			  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST">
                  <button type="submit" class="dropdown-item" name="signout" id="signout" >
                    <i class="mdi mdi-logout mr-2 text-primary" ></i> Sign Out </button>
                </form>
              </div>
            </li>

            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="/MasterCliniCare/Customer/CustomerHomePage/index.php">
                <i class="mdi mdi-home"></i>
              </a>
            </li>
			
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
			
          </ul>
		  
		  
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
	  
	  
	  
      <!-- SIDEBAR -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
				
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $row['name']; ?></span>
                  <span class="text-secondary text-small">Customer</span>
                </div>
				
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>  
            </li>
			
			
            <!-- PART PROFILE CUSTOMER -->
            <li class="nav-item">
              <a class="nav-link" href="../../icons/mdi.php">
                <span class="menu-title">My Profile</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
			
			
			<!-- PART UNTUK CUSTOMER VIEW APPOINTMENT HISTORY -->
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.php">
                <span class="menu-title">My History</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
			
           
		   <div class="border-bottom"></div>
			<div class="mt-4">
				<div class="border-bottom">
				
				 <!-- PART SERVICES -->
						<li class="nav-item">
							<a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="ui-basic">
								<span class="menu-title">Services</span>
								<i class="menu-arrow"></i>
								<i class="mdi mdi-gamepad menu-icon"></i>
							</a>
							<div class="collapse" id="general-pages">
								<ul class="nav flex-column sub-menu">
									<li class="nav-item"> <a class="nav-link" href="../../pages/services/primaryCare.php">Primary Care</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/services/medicalCheck.php">Medical Check-Up</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/services/smoking.php">Smoking Cessation</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/services/momBaby.php">Mom & Baby Care</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/services/pharmacy.php">Pharmacy</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/services/covid.php">Covid-19 Centre</a></li>
								</ul>
							</div>
						</li>
						
						
            <!-- PART MEDICINE -->
						<li class="nav-item">
							<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
								<span class="menu-title">Medicine</span>
								<i class="menu-arrow"></i>
								<i class="mdi mdi-format-list-bulleted menu-icon"></i>
							</a>
							<div class="collapse" id="ui-basic">
								<ul class="nav flex-column sub-menu">
									<li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/catalogueMedicine.php">Medicine Catalogue</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buyMedicine.php">Buy Medicine</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.php">Purchased Medicine</a></li>
								</ul>
							</div>
						</li>
						
						
					<!-- PART BOOKING --> 
						<li class="nav-item">
							<a class="nav-link" href="../../pages/booking/bookingCustomer.php">
								<span class="menu-title">Booking Appointment</span>
								<i class="mdi mdi-table-large menu-icon"></i>
							</a>
						</li>
               </div>
            </div>
          </ul>
        </nav>
		
		
        <!-- MAIN CONTENT -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Primary Care - Services </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Services</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Primary Care</li>
                </ol>
              </nav>
            </div>
            <div class="row">

			
			<div class="col-md-4 grid-margin stretch-card">
                <p>
                     <img 
					 src="../../assets/images/gambar/primaryCare.png"
					 style = "width : 320px">
                    </p>
              </div>
			  
			  
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h6>We offer a full range of primary care services for adults and children</h6>
                    <p class="card-description"></p>
					<ul class="list-star">
                      <li>A primary care clinic is a medical facility that focuses on 
					  the initial treatment of medical ailments.
					  In most cases, the conditions seen at the clinic are not serious, 
					  or not considered life threatening. 
					  If there is a condition discovered at a primary care clinic 
					  that may be considered extremely dangerous to the patient,
					  a referral to a specialist may be made.</li>
					  
					  <br>
					  
                      <li>Primary care clinics provide day-to-day healthcare services to patients. 
					  Primary care acts as the principal point of continuous healthcare for patients 
					  and also coordinates specialist care as may be required by the patient. 
					  Primary care is usually provided by general practitioners, 
					  family medicine doctors.</li>
                    </ul>
                  </div>
                </div>
              </div>
			  
			  
			  
			  
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="card-title">How we care for you?</h4>
                        <p class="card-description">We offer a full range of primary care services for adults and children.</p>
                        
						<div class="template-demo d-flex justify-content-between flex-nowrap">
                          <ul class="list-arrow">
                      <li><strong>Family Medicine</strong>
						<p> Offers care such as Workplace injuries and Children’s issues.
					  </li>
					  
                      <li><strong>Annual Physicals</strong>
						<p> We care for all members of your family.
					  </li>
					  
					  <li><strong>Laboratary Testing</strong>
						<p>For check a sample of your blood, urine, or body tissues.
					  </li>
					  
					  <li><strong>Screening for Health Conditions </strong>
						<p>Like diabetes, high blood pressure, and high cholesterol.
					  </li>
					  
					  <li><strong>Treatment of Mild Symptoms</strong>
						<p>Such as fever, headache, cough, and sore throat.
					  </li>
					  
					  <li><strong>Treatment of Minor Injuries </strong>
						<p>Such as mild cuts, scrapes, or burns.
					  </li>
                    </ul>  
                     </div>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>


			  
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Gallery</h4>
                    <p class="card-description"></p>
					<br>
                    
					<div class="template-demo">
					<p>
                     <img 
					 src="../../assets/images/gambar/headache.jpg"
					 style = "width : 280px">
                    </p>
					 <br>
					 
					<p>
					 <img 
					 src="../../assets/images/gambar/broke.jpg"
					 style = "width : 280px">
					</p>
					 <br>			
                    </div>
					
                  </div>
                </div>
              </div>
			  
			  <button type="submit" class="btn btn-gradient-info"
			  style = "width : 265px; display: block; margin: 0 auto;" >
                    <i class="mdi mdi-account"></i> Make An Appointment
			  </button>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
			  &copy; Copyright <strong><span>C L I N I C A R E</span></strong>

            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>