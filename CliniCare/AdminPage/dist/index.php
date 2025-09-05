<?php
include "../db_conn.php";
session_start();
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

require_once __DIR__ . '/_auth.php';

$email = $_SESSION['email'];
$stmt = $con->prepare("SELECT * FROM customer WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
$row = mysqli_fetch_array($res);
if (!isset($_SESSION['email'])) {
  header("Location: ../../index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard | CliniCare</title>

  <!-- General CSS Files -->
  <link href="assets/img/icon.jpeg" rel="icon">
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

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
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">
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
              <a href="profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon">
                <form action="../../Customer/CustomerEntry.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">
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
            <a href="./">C L I N I C A R E</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="./">CC</a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="nav-link" href="./"><i class="ion-home"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="customerList"><i class="ion-person"> </i><span>Customer</span></a></li>
            <li class="dropdown">
              <a class="nav-link has-dropdown"><i class="ion-medkit"></i> <span>Medicine</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="paymentHistory">Payments</a></li>
                <li><a class="nav-link" href="purchaseHistory">Purchases</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="nav-link has-dropdown"><i class="ion-clipboard"></i><span>Appointments</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="appointmentList">Appointments List</a></li>
                <li><a class="nav-link" href="appointmentSlot">Appointments Slot</a></li>
              </ul>
            </li>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12" style="cursor: pointer;" onClick="window.location='purchaseHistory.php';">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Purchases</h4>
                  </div>
                  <div class="card-body">
                    <?php
                    include '../db_conn.php';
                    $query = mysqli_query($con, "SELECT COUNT(transactionID) FROM userpayment");
                    $row = mysqli_fetch_array($query);
                    if ($row[0] == 0) {
                      echo "0 Purchases";
                    } else {
                      echo "$row[0] Purchases";
                    }

                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12" style="cursor: pointer;" onClick="window.location='purchaseHistory.php';">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Sales</h4>
                  </div>
                  <div class="card-body">
                    <?php
                    include '../db_conn.php';
                    $query = mysqli_query($con, "SELECT SUM(quantity) FROM usercart WHERE status=0");
                    $row = mysqli_fetch_array($query);
                    if ($row[0] == null) {
                      echo "0 Items Sold";
                    } else {
                      echo "$row[0] Items Sold";
                    }

                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12" style="cursor: pointer;" onClick="window.location='paymentHistory.php';">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Payments</h4>
                  </div>
                  <div class="card-body">
                    <?php
                    include '../db_conn.php';
                    $query = mysqli_query($con, "SELECT SUM(price) FROM userpayment");
                    $row = mysqli_fetch_array($query);
                    $price = $row[0];
                    $totalPrice = number_format($price, 2);
                    if ($row[0] == null) {
                      echo "RM 0.00";
                    } else {
                      echo "RM $totalPrice";
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!--Appointsment List-->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Confirmed Appointments List</h4>
              <div class="card-header-action">
                <a href="appointmentList" class="btn btn-danger">View Full List <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive table-invoice">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Email</th>
                      <th scope="col">Name</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Date</th>
                      <th scope="col">Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../db_conn.php";
                    $sql = "SELECT * FROM appointment WHERE status = 1";
                    $result = mysqli_query($con, $sql);
                    $x = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $x . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['phoneNumber'] . "</td>";
                      echo "<td>" . $row['date'] . "</td>";
                      echo "<td>" . $row['time'] . "</td>";
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
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <strong><span>C L I N I C A R E</span></strong>
        </div>
      </footer>
      </section>
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
  <script src="assets/modules/jquery.sparkline.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
