<?php
include "../db_conn.php";
session_start();
require_once __DIR__ . '/../../app/Middleware/Auth.php';
Auth::requireRole('admin');
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' ");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Available Slot | CliniCare</title>

  <!-- General CSS Files -->
  <link href="assets/img/icon.jpeg" rel="icon">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/prism/prism.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

</head>

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
              <div class="d-sm-none d-lg-inline-block">Hello, <?php echo $row['name']; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon">
                <form action="../../Customer/CustomerEntry.php" method="POST">
                  <button type="submit" class="dropdown-item has-icon" name="signout" id="signout" style="color:red; text-align:center">Sign Out </button>
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
            <li><a class="nav-link" href="index.php"><i class="ion-home"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="customerList.php"><i class="ion-person"> </i><span>Customer</span></a></li>
            <li class="dropdown">
              <a class="nav-link has-dropdown"><i class="ion-medkit"></i> <span>Medicine</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="paymentHistory.php">Payments</a></li>
                <li><a class="nav-link" href="purchaseHistory.php">Purchases</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="nav-link has-dropdown"><i class="ion-clipboard"></i><span>Appointments</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="appointmentList.php">Appointments List</a></li>
                <li><a class="nav-link" href="appointmentSlot.php">Appointments Slot</a></li>
              </ul>
            </li>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Available Appointments</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Appointment</a></div>
              <div class="breadcrumb-item">All Appointment Slot</div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="section-title mt-0">All Appointments
                <a class="nav-link" href="addSlot.php" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Add Appointment Slot</a>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Update Status</th>
                        <th scope="col">Delete Slot</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../db_conn.php";
                      $sql = "SELECT * FROM appointmentslot ORDER BY date";
                      $result = mysqli_query($con, $sql);
                      $x = 1;

                      while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo "<td>" . $x . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['time'] . "</td>";

                        if ($row['count'] > 0) {
                          if ($row['status']  == 0) {
                            echo "<td style='color:#00D100'>Available (" . $row['count'] . ")</td>";
                          } else {
                            echo "<td style='color:#D10000'>Closed </td>";
                          }
                        } else {
                          echo "<td style='color:#D10000'>Unavailable (" . $row['count'] . ")</td>";
                        }


                        $appSId = $row['appSId'];


                        echo '<td><form action="../AdminEntry.php" method="POST">';

                        echo '<input type="hidden" name="appToClose" 
												value="' . $appSId . '" >';
                        echo '<button type="submit" value="Close Appointment" 
												name="closeAppointment" class="btn btn-icon btn-danger">
												<h7> Close <h7></button>';

                        echo '&nbsp;&nbsp;<input type="hidden" name="appToOpen" 
												value="' . $appSId . '" >';
                        echo '<button type="submit" value="Open Appointment" 
												name="openAppointment" class="btn btn-icon btn-success">
												<h7> Open <h7></button>';

                        echo '<td>';
                        echo '<input type="hidden" value="' . $appSId . '" name="SlotToDelete">';
                        echo '<input type="submit" class="btn btn-danger" name="deleteSlot" id="deleteSlot" value="Delete">';
                        echo '</td>';
                        echo '</form></td>';
                        echo "</tr>";
                        $x++;
                      }
                      

                      ?>
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
  </div>
  </div>
  <!-- partial:../../partials/_footer.html -->
  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; <strong><span>C L I N I C A R E</span></strong>
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