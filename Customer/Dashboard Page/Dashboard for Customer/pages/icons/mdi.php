<?php
session_start();
?>

<!-- PAGE FOR MY PROFILE CUSTOMER -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile | CliniCare</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
	<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script> 
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
 
    <div class=" container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
                  <p class="mb-1 text-black"><?php echo $_SESSION['email']; ?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST">
                  <button type="submit" class="dropdown-item" name="signout" id="signout" >
                    <i class="mdi mdi-logout mr-2 text-primary" ></i> Sign Out </button>
                </form>
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
                  <span class="font-weight-bold mb-2">Customer Name</span>
                  <span class="text-secondary text-small">Customer</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
			
			<!-- VIEW DASHBOARD CUSTOMER -->
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
			
			
			<!-- PART PROFILE CUSTOMER -->
			<li class="nav-item">
              <a class="nav-link" href="../../pages/icons/mdi.html">
                <span class="menu-title">My Profile</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
			
			
			<!-- PART UNTUK CUSTOMER VIEW APPOINTMENT HISTORY -->
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
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
									<li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/catalogueMedicine.html">Medicine Catalogue</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Buy Medicine</a></li>
									<li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Purchased Medicine</a></li>
								</ul>
							</div>
						</li>
			
			
					<!-- PART BOOKING --> 
						<li class="nav-item">
							<a class="nav-link" href="../../pages/booking/bookingCustomer.html">
								<span class="menu-title">Booking Appointment</span>
								<i class="mdi mdi-table-large menu-icon"></i>
							</a>
						</li>
			</div>
            </div>
          </ul>
        </nav>
		  </body>
			  
            <?php
            session_start();
                 include "updateProcess.php";
                 $servername = "localhost";
                 $username = "clinicarecustomer";
                 $password = "customer";
                 $dbname = "clinicare";
             
                 $mysqli = new mysqli($servername, $username, $password, $dbname);
                 $email = $_SESSION['email'];
                 
                 $resultSet2 = $mysqli->query("SELECT * FROM customer WHERE email='$email' ");
            ?>
            <?php
            while ($rows = mysqli_fetch_assoc($resultSet2))
            {
              echo '     <div class="main-panel">
              <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title"> My Profile </h3>
              </div>
        <form action="updateProcess.php" method="POST">
         
              <div class="row">
          
           <!-- Edit Info details Section -->
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Personal Info</h4>
                      <!-- <form class="form-sample"> -->

                        <p class="card-description"></p>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" value="'.$rows['name'].'" >
                              </div>
                            </div>
                          </div>
                        </div>
              
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">IC Number</label>
                              <div class="col-sm-9">
                                <input class="form-control" placeholder="xxxxxx-xx-xxxx" name="ICnumber" value="'.$rows['ICnumber'].'" >
                              </div>
                            </div>
                          </div>
              
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Date of Birth</label>
                              <div class="col-sm-9">
                                <input type = "date" class="form-control" placeholder="dd/mm/yyyy" name="birthDate" value="'.$rows['birthDate'].'">
                              </div>
                            </div>
                          </div>
                        </div>
              
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Phone Number</label>
                              <div class="col-sm-9">
                                <input class="form-control" placeholder="xxx-xxxxxxx" name="phoneNumber" value="'.$rows['phoneNumber'].'" >
                              </div>
                            </div>
                          </div>
              
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9">
                                <input class="form-control" placeholder="info.clinicareweb@gmail.com" name="email" value="'.$rows['email'].'" disabled >
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Address</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" value="'.$rows['address'].'" >
                              </div>
                            </div>
                          </div>
              
               <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label"></label>
                              <div class="col-sm-9">
                                 <input type="submit" name = "updateProfile" value = "Update" class="btn btn-gradient-primary mr-2">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
            </form>
                    </div>
                  </div>
                </div>
          
          
          <!-- Change Password Section -->
          <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Password Changes</h4>
            <p class="card-description"></p>
                      <form class="form-sample">
              <div class="form-group">
                <label>Current Password</label>
                <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Username">
              </div>
              
              <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control form-control-lg" placeholder="New Password" aria-label="Username">
              </div>
            
              <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" class="form-control form-control-lg" placeholder="Confirm New Password" aria-label="Username">
              </div>
              
                        <button type="submit" class="btn btn-gradient-primary mb-2">Save</button>
                      </form>
                    </div>
                  </div>
          </div>
              </div>
            
        
        
        
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
              <div class="container-fluid clearfix">
          &copy; Copyright <strong><span>C L I N I C A R E</span></strong>
              </div>
            </footer>
  
          </div>
        </div>
      </div>';

            }
            ?>
			  
</html>
