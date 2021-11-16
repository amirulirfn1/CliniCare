<?php
include "../db_conn.php";
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' ");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Payment History | CliniCare</title>

  <!-- General CSS Files -->
  <link href="assets/img/icon.jpeg" rel="icon">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
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
            <h1>Medicine Payment History</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Medicine</a></div>
              <div class="breadcrumb-item">Purchase History</div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="section-title mt-0">All Payments</div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Total Price</th>
                    <th>Transaction ID</th>
                    <th>Payment Date</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  include "../db_conn.php";
                  $query = mysqli_query($con, "SELECT * FROM userpayment");
                  $x = 1;

                  while ($row = mysqli_fetch_array($query)) {
                    $userID = $row['userID'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $price = $row['price'];
                    $date = $row['date'];
                    $date = date('d-m-Y', strtotime($date));
                    $transactionID = $row['transactionID'];

                    echo "<tr>";
                    echo "<td> $x </td>";
                    echo "<td> $name </td>";
                    echo "<td> $email </td>";
                    echo "<td>RM " . number_format((float)$price, 2, '.', '') . " </td>";
                    echo "<td> $transactionID </td>";
                    echo "<td> $date </td>";
                    echo "</tr>";
                    $x++;
                  }

                  ?>
                </tbody>
              </table>
              </tbody>
              </table>
            </div>
        </section>
      </div>
    </div>
  </div>
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
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>