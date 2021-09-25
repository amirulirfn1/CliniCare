<?php
include_once "db_conn.php";
session_start();
$email=$_SESSION['email'];
$query=mysqli_query($conn,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);
?>

<!-- PAGE FOR MY PROFILE CUSTOMER -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile | CliniCare</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
	<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script> 
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/gambar/icon.jpeg" />
	
	<style>
	.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 100%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 100%;
   border-radius: 5px;
   margin: 20px auto;
}

.profileCard {
	background-color : white;
  transition: 0.3s;
  width : 30%;
  border-radius: 5px;
  margin : auto;
   
}

.profileCard:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.image {
  border-radius: 5px 5px 0 0;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
 
}

.container {
  padding: 2px 16px;
  text-align : center;
}
</style>
  </head>
  
  <body>
 
    <div class="container-scroller">
	
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="mdi.php"><img src="../assets/images/gambar/logobanner.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="mdi.php"><img src="../assets/images/gambar/icon.jpeg" alt="logo" /></a>
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
                  <img src="../assets/images/faces/face1.jpg" alt="image">
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
                  <img src="../assets/images/faces/face1.jpg" alt="profile">
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
              <a class="nav-link" href="mdi.php">
                <span class="menu-title">My Profile</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
			
			
			<!-- PART UNTUK CUSTOMER VIEW APPOINTMENT HISTORY -->
            <li class="nav-item">
              <a class="nav-link" href="../pages/tables/basic-table.php">
                <span class="menu-title">My History</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
			
			
			<div class="border-bottom"></div>
			<div class="mt-4">
				<div class="border-bottom">
					
					
					<!-- PART SERVICES -->
						<li class="nav-item">
							<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
								<span class="menu-title">Services</span>
								<i class="menu-arrow"></i>
								<i class="mdi mdi-format-list-bulleted menu-icon"></i>
							</a>
							<div class="collapse" id="ui-basic">
								<ul class="nav flex-column sub-menu">
									<li class="nav-item"> <a class="nav-link" href="../pages/services/primaryCare.php">Primary Care</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/services/medicalCheck.php">Medical Check-Up</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/services/smoking.php">Smoking Cessation Campaign</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/services/momBaby.php">Mom & Baby Care</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/services/pharmacy.php">Pharmacy</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/services/covid.php">Covid-19 Centre</a></li>
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
									<li class="nav-item"> <a class="nav-link" href="../pages/ui-features/catalogueMedicine.php">Medicine Catalogue</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/ui-features/buyMedicine.php">Buy Medicine</a></li>
									<li class="nav-item"> <a class="nav-link" href="../pages/ui-features/buttons.php">Purchased Medicine</a></li>
								</ul>
							</div>
						</li>
			
			
					<!-- PART BOOKING --> 
						<li class="nav-item">
							<a class="nav-link" href="../pages/booking/bookingCustomer.php">
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
				<h3 class="page-title"> My Profile </h3>

			 
              </div>

            <div class="row">
			
			<!-- Edit Profile Picture Section -->
			<div class="col-12 grid-margin stretch-card">
                <div class="profileCard">
                    <div class="card-body">
                    <form class="forms-sample">
						<img src="../assets/images/faces/face2.jpg" alt="image" class = "image">
						<br>
						<div class="container">
							<h4><b><?php echo $row['name']; ?></b></h4>
							<p>Customer</p>
						</div>  
						<div class="form-group">
                            <label class="col-sm-3 col-form-label"></label>
                            <button type="submit" name = "update" 
							   class="btn btn-gradient-primary mr-2">
							   <i type = "submit" class="mdi mdi-camera-enhance mdi-lg"
							   data-width="30"></i>
							   </button>
                          </div>	
                    </form>
                </div>
				</div>
              </div>
			  
			  
			<!-- Edit Info details Section -->
				<div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
					
                      <h4 class="card-title">Personal Info</h4>
					  <br>
						<form class="forms-sample" action="updateForm.php" method="post">
                            
							<div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control form-control-sm" name="name" id="name" 
								value= "<?php echo $row['name']; ?>" disabled>
                            </div>

                            <div class="form-group">
                              <label>IC Number</label>
                              <input class="form-control form-control-sm" placeholder="xxxxxx-xx-xxxx" name="ICnumber" 
								id="ICnumber" value="<?php echo $row['ICnumber']; ?>" disabled>
                        
                            </div>
              
                            <div class="form-group">
                              <label>Date of Birth</label>
                              <input type = "date" class="form-control form-control-sm" placeholder="dd/mm/yyyy" 
								name="birthDate" id="birthDate" value="<?php echo $row['birthDate']; ?>" disabled>
                            </div>
              
                            <div class="form-group">
                              <label>Phone Number</label>
                              <input class="form-control form-control-sm" placeholder="xxx-xxxxxxx" 
								name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" disabled>
                      
                            </div>
              
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control form-control-sm" placeholder="info.clinicareweb@gmail.com" 
								name="email" value="<?php echo $row['email']; ?>" disabled >
                     
                            </div>

                            <div class="form-group">
                              <label >Address</label>
                              <input type="text" class="form-control form-control-sm" name="address" 
								value="<?php echo $row['address']; ?>" disabled >
                            </div>

                          <div class="form-group">
                            <label class="col-sm-3 col-form-label"></label>
                            <button type="submit" name = "update" 
							   class="btn btn-gradient-primary mr-2">Update</button>
                          </div>
                     </form>
                    </div>
                  </div>
                </div>
           
				  <!-- Change Password Section --> 
			  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
				  <form action="change-p.php" method="post">
                    <h4 class="card-title">Password Changes</h4>
					<p class="card-description"></p>
					<link rel="stylesheet" type="text/css">
					     	<?php if (isset($_GET['error'])) { ?>
     		                <p class="error"><?php echo $_GET['error']; ?></p>
     	                    <?php } ?>

     	                    <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>
							
                    <form class="form-sample">
						<div class="form-group">
							<label>Current Password</label>
							<input type="password" class="form-control form-control-lg" 
							placeholder="Password" name="op" aria-label="Username">
						</div>
						
						<div class="form-group">
							<label>New Password</label>
							<input type="password" class="form-control form-control-lg"  
							name="np" placeholder="New Password" aria-label="Username">
						</div>
					
						<div class="form-group">
							<label>Confirm New Password</label>
							<input type="password" class="form-control form-control-lg"  
							name="c_np" placeholder="Confirm New Password" aria-label="Username">
						</div>
						
						<div class="form-group">
                            <label class="col-sm-4 col-form-label"></label>
                            <button type="submit" class="btn btn-gradient-primary mb-2">Change</button>
                          </div>
                      
                    </form>
                  </div>
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
      </div>
          		  </body>  
</html>

<?php

if (isset($_POST['updateProfile'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phoneNumber'];
        $icNumber = $_POST['ICnumber'];
        $birthDate = $_POST['birthDate'];
		$address = $_POST['address'];

        $query= "UPDATE customer SET name = '$name' WHERE email = '$email'";
        mysqli_query($conn, $query);
}

if($mysqli->query($query) == TRUE)
		{
		echo "Your profile info is updated!";
    header( "refresh:1; url=mdi.php");
		}
	else
	{
		echo "Error";
	}	

?>