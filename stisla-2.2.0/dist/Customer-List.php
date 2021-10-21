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
  <title>Customer List &mdash; CliniCare</title>

  <!-- General CSS Files -->
  <link href="assets/img/icon.jpeg" rel="icon">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/prism/prism.css">

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
            <img alt="image" src="assets/img/doctors/doctors-1.jpg" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hello, <?php echo $row['name']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">

              <a href="features-profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
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
            <li><a class="nav-link" href="Customer-List.php"><i><ion-icon name="person"></ion-icon></i></i><span>Customer List</span></a></li>
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
            <h1>Customer List</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Customer List</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
           <div class="card">
                  <div class="card-body">
                    <div class="section-title mt-0">All Customer</div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
						  <th scope="col">Phone Number</th>
						  <th scope="col">IC Number</th>
                          <th scope="col">Delete</th>
						  <th scope="col">Edit</th>
						  
                        </tr>
                      </thead>
                      <tbody>

				<?php
                      $con = mysqli_connect("localhost","clinicarecustomer","customer","clinicare");
                      $sql = "SELECT customer.name, customer.email, customer.phoneNumber, customer.ICnumber FROM customer 
                      INNER JOIN user ON customer.email = user.email WHERE user.usertype = 'customer' order by name";
                      $result = mysqli_query($con,$sql);
                      $x = 1;
                                while($row = mysqli_fetch_array($result))
                                
                                {
                                    echo "<tr>";
										echo "<td> $x </td>";
										echo "<td>".$row['name']."</td>";
										echo "<td>".$row['email']."</td>";
										echo "<td>".$row['phoneNumber']."</td>";
										echo "<td>".$row['ICnumber']."</td>";

                                    $customerS = $row['email'];

					
									echo '<td><form action="../AdminEntry.php" method="POST">';
										echo '<input type="hidden" name="emailToDelete" 
												value="'.$customerS.'" >';
										echo '<button type="submit" value="Delete Customer" 
												name="deleteCustomer" class="btn btn-icon btn-danger">
												<i class="fas fa-times"><h7> Delete <h7></i></button>';
									echo '</form></td>';

									echo '<td><form action="Edit-Customer.php" method="POST">';
										echo '<input type="hidden" name="staffIdToUpdate" 
												value="'.$customerS.'" >';
										echo '<button type="submit" value="editCustomer" 
												name="editCustomer" class="btn btn-icon btn-primary">
												<i class="fas fa-edit"><h7> Edit <h7></i></button>';
									echo '</form></td>';

									echo "</tr>";
                                    
                                    $x++;
                                }

                      ?>
                        
                      </tbody>
                    </table>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
        <!-- partial:../../partials/_footer.html -->
      <footer class="footer">
          <div class="container-fluid clearfix">
      &copy; Copyright <strong><span>C L I N I C A R E</span></strong>
          </div>
        <div class="footer-right"></div>
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
  <script src="assets/modules/prism/prism.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/bootstrap-modal.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>