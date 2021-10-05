<?php

//session_start();

$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
session_start();
$email=$_SESSION['email'];
$query=mysqli_query($con,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);

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
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/doctors/doctors-2.jpg" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Atiqah Syikin Amirah</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/doctors/doctors-3.jpg" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Aiman Yoga</b>
                    <p>Stock Ketum Dah Masuk Ke?</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/doctors/doctors-4.jpg" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Putri Intan Payung Indah Zulaikha Odelia Ladasyia Absyari</b>
                    <p>Tolong Check Appointments please</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
		  
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/doctors/doctors-1.jpg" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $row['name']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
              <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST">
                  <button type="submit" class="dropdown-item" name="signout" id="signout" >
                    <i class="fas fa-sign-out-alt" ></i> Sign Out </button>
                </form>
              </a>
            </div>
          </li>
        </ul>
      </nav>
	  
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
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>List Of Customer</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">All Customer</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Add Customer</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">Delete Customer</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>View Purchase Medicine</span></a></li>
            <li class="dropdown">
              
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Appointments List</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="forms-advanced-form.html">All Appointments</a></li>
                <li><a class="nav-link" href="forms-editor.html">Appointments Detail</a></li>
                <li><a class="nav-link" href="forms-validation.html">Cancel Appointments</a></li>
              </ul>       </aside>
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
                    <img alt="image" src="assets/img/doctors/doctors-1.jpg" class="rounded-circle profile-widget-picture">
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
			  
			  <div>
				<form action = "upload.php"
					  method = "POST"
					  enctype = "multipart/form-data">
					  
					  <input type = "file"
					         name = "my_image">
							 
					  <input type = "submitPicture"
					         name = "submitPicture"
							 value = "Upload">
				</form>
			  </div>
			  <!--<div class="wrapper">   
                    <input type = "file" class = "my_file" >
              </div>
			  <!-- <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
				Upload File
				</button>  -->
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