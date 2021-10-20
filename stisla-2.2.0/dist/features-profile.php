<?php

//session_start();

$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
session_start();
$email=$_SESSION['email'];
$query=mysqli_query($con,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);

if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
        $con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
        $q = mysqli_query($con,"UPDATE customer SET image = '".$_FILES['file']['name']."' WHERE email = '$email'");
		header( "refresh:0; url=features-profile.php");
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Profile &mdash; CliniCare</title>

  <!-- General CSS Files -->
  <link href="assets/img/icon.jpeg" rel="icon">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
  <link rel="stylesheet" href="profilePictureStyle.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-94034622-3');
  </script>
  
  
<style>
  
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 5px;
   width: 55%;
   border-radius: 5px;
   margin: 16px auto;
   font-size: 14px;  
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 5px;
   width: 85%;
   border-radius: 5px;
   margin: 16px auto;
   font-size: 14px;
}


</style>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            

            <div class="d-sm-none d-lg-inline-block"><?php echo "Hello, " . $row['name']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <a href="#" class="dropdown-item has-icon">
                <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST">
                  <button type="submit" class="dropdown-item has-icon" name="signout" id="signout" style="color:red; text-align:center" >Sign Out </button>
                </form>
              </a>
            </div>
          </li>
        </ul>
      </nav>
	  
       <!--SideBar-->
       <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">C L I N I C A R E</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">CC</a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="Customer-List.php"><i><ion-icon name="person"></ion-icon></i> </i> <span>Customer List</span></a></li>
            <li><a class="nav-link" href=><i class="far fa-square"></i> <span>Purchase Medicine</span></a></li>
            <ul class="sidebar-menu">
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Appointments</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="Appointment-List.php">Appointments List</a></li>
                <li><a class="nav-link" href="All-Appointment-Slot.php">All Appointments Slot</a></li>
                <li><a class="nav-link" href="Appointments-Slot.php">Add Appointments Slot</a></li>
              </ul>
            </li>
                    </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $row['name']; ?></h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
				
				  <div class="profile-widget-header"> 
					
					<?php
						echo "<img class='rounded-circle profile-widget-picture' width='100' height='100' src='pictures/".$row['image']."' alt='Profile Pic'>";
					?>	  
                    
					
					<form action="" method="post" enctype="multipart/form-data">
						<input type="file" name="file">
						<input type="submit" name="submit">
					</form>	
                  </div>

                  <div class="profile-widget-description">
                    <div class="profile-widget-name">Hi, <?php echo $row['name']; ?>! 
					<div class="text-muted d-inline font-weight-normal">
					<div class="slash"></div> Staff Admin</div></div>
                  </div>
                </div>
				
				<div class="card profile-widget">
				<form class="form-sample" action="change-p.php" method="post">
					<div class="card-header">
                      <h4>Change Password</h4>
                    </div>
					
                    <div class="card-body">
					
                        <div class="row">
						  <div class="form-group col-12">
                            <label>Current Password</label>
                            <input type="password" class="form-control" 
							placeholder="Password" name="op">
                          </div>
						  
                          <div class="form-group col-12">
                            <label>New Password</label>
                            <input type="password" class="form-control" 
							name="np" placeholder="New Password" aria-label="Username" 
							title="8 characters minimum">
                          </div>
						  
                          <div class="form-group col-12">
                            <label>Confirm New Password</label>
                            <input type="password" pattern=".{8,}" class="form-control"  
							name="c_np" placeholder="Confirm New Password" aria-label="Username" 
							title="8 characters minimum">
                          </div>
						  
						  <link rel="stylesheet" type="text/css">
					     	<?php if (isset($_GET['error'])) { ?>
     		                <p class="error"><?php echo $_GET['error']; ?></p>
     	                    <?php } ?>

     	                    <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>
							<p class="card-description"></p>
                        </div>
					</div>
					
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Password Changes</button>
                    </div>
					</form>
                </div>
              </div>
			  
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" 
				  action="/MasterCliniCare/Customer/CustomerEntry.php" novalidate="">
                    
					<div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
					
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="text" class="form-control" 
							name="email" value="<?php echo $row['email']; ?>" disabled>
                          </div> 
                        </div>
						
                        <div class="row">
						  <div class="form-group col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" 
							name="name" value="<?php echo $row['name']; ?>">
                          </div>
						  
                          <div class="form-group col-12">
                            <label>IC Number</label>
                            <input type="text" class="form-control" 
							name="icNumber" value="<?php echo $row['ICnumber']; ?>">
                          </div>
						  
                          <div class="form-group col-md-6 col-12">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" 
							name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>">
                          </div>
						  
						  <div class="form-group col-md-6 col-12">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" 
							name="birthDate"  value="<?php echo $row['birthDate']; ?>">
                          </div>
						  
						  <div class="form-group col-md-12 col-12">
                            <label>Address</label>
                            <input type="text" class="form-control" 
							name="address" value="<?php echo $row['address']; ?>">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" name = "updateProfileAdmin"
					  class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
			  
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
      &copy; Copyright <strong><span>C L I N I C A R E</span></strong>
          </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/summernote/summernote-bs4.js"></script>

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>

