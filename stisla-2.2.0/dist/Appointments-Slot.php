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
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Appointment Slot &mdash; CliniCare</title>

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
            

            <div class="d-sm-none d-lg-inline-block">Hello, <?php echo $row['name']; ?></div></a>
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
            <li><a class="nav-link" href="modules-datatables.php"><i class="far fa-square"></i> <span>Purchase Medicine</span></a></li>
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
            <h1>Appointment</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Appointment</a></div>
              <div class="breadcrumb-item">Add Appointment Slot</div>
            </div>
          </div>

          <div class="section-body">
           
                <div class="card">
                  <div class="card-header">
                    <h4>Add Appointment</h4>
                  </div>
                  <a class="nav-link" href="All-Appointment-Slot.php" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> View All Available Appointment Slot</a>
                  <div class="card-body">
                    <div class="section-title mt-0">Service</div>
                    <div class="form-group">
                      <label>Choose One</label>
                      <select class="custom-select">
                        <option selected>Open this select menu</option>
                        <option value="1">Primary Care</option>
                        <option value="2">Medical Check-Up</option>
                        <option value="3">Smoking Cessation</option>
                        <option value="4">Mom & Baby Care</option>
                        <option value="5">Pharmacy</option>
                        <option value="6">Covid-19 Centre</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <div class="section-title mt-0">Date</div>
                      <input type="datetime-local" class="form-control">
                    </div>
                    
                    <a href="#" class="btn btn.btn-lg btn-success">Submit</a>

                   
        </section>
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