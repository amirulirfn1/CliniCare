<?php

$con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
session_start();
$email = $_GET['emailhidden'];
$query=mysqli_query($con,"SELECT * FROM customer WHERE email='$email' ");
$row=mysqli_fetch_array($query);
?>

<?php echo $email ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bootstrap Components &rsaquo; Table &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link href="assets/img/icon.jpeg" rel="icon">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
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
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Forms</a></div>
              <div class="breadcrumb-item">Advanced Forms</div>
            </div>
          </div>
            <div class="col-md-12">
		
        <div class="card">
		<form  action="../AdminEntry.php" method = "POST">
		
				  <div class="card-body p-0">
                    <h2 class="section-title"> <h4>Edit Customer<h4></h2>
                  </div>
				  
				  
				  
                  <div class="card-body">
				  
				  <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" 
					  name = "name" value="<?php echo $row['email']; ?>" disabled >
                    </div>
					
					<div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" 
					  name = "name" value= "<?php echo $row['name']; ?>" >
                    </div>
					
                    <div class="form-group">
                      <label>Contact Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number"
						name = "phoneNumber" value="<?php echo $row['phoneNumber']; ?>" >
                      </div>
                    </div>
					
                    <div class="form-group">
                      <label>IC Number</label>
                      <input type="text" class="form-control invoice-input"
					  name = "ICnumber" value="<?php echo $row['ICnumber']; ?>" >
                    </div>
					
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="date" class="form-control datemask" placeholder="YYYY/MM/DD"
					  name = "birthDate" value="<?php echo $row['birthDate']; ?>" >
                    </div>
                  </div>

				  <div class="col-12 col-sm-12">
					<div class="card">
						<div class="card-body text-center">
							<button class="btn btn-primary" id="swal-2" name="updateStaffButton">Edit</button>
							<br><br><input type = "submit" value = "Kemaskini" 
											name="updateStaffButton" class="submit2"> 
						</div>
					</div>
				  </div>
		</form> 
        </div>
         <!-- partial:../../partials/_footer.html -->
         <footer class="footer">
          <div class="container-fluid clearfix">
      &copy; Copyright <strong><span>C L I N I C A R E</span></strong>
          </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
	</section>
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
	<script src="assets/modules/sweetalert/sweetalert.min.js"></script>
 
 <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-sweetalert.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>