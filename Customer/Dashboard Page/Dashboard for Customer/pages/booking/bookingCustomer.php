<!-- PAGE UNTUK BOOKING APPOINTMENT -->

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
    <title>Booking Appointment | CliniCare</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
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
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/gambar/logobanner.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/gambar/icon.jpeg" alt="logo" /></a>
        </div>
		
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
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
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Sign Out </a>
              </div>
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
	  
	  
      <!-- partial -->
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
		
		
		
        <!-- Main Content -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Booking Appointment </h3>
            </div>
			
			
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">NI BOLEH LETAK HI, @NAMA CUSTOMER</h4>
                    <p></p>
                    <table class="table table-hover">
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
                          <td>Photoshop</td>
                          <td class="text-danger"> 31/8/2021 </td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
						
                        <tr>
                          <td>2</td>
                          <td>Flash</td>
                          <td class="text-danger"> 24/7/2021 </td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
						
                        <tr>
                          <td>3</td>
                          <td>Premier</td>
                          <td class="text-danger"> 13/6/2021 </td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
						
                        <tr>
                          <td>4</td>
                          <td>After effects</td>
                          <td class="text-success"> 2/5/2021 </td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
						
                        <tr>
                          <td>5</td>
                          <td>53275535</td>
                          <td class="text-success"> 1/12/2020 </td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>