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
  <title>Customer List | CliniCare</title>

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
              <a href="profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
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
            <h1>Customer List</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Customer</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="section-title mt-0">All Customer</div>
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">IC Number</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../db_conn.php";
                      $sql = "SELECT customer.name, customer.email, customer.phoneNumber, customer.ICnumber, customer.birthDate FROM customer 
                      INNER JOIN user ON customer.email = user.email WHERE user.usertype = 'customer' order by name";
                      $result = mysqli_query($con, $sql);
                      $x = 1;
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td> $x </td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phoneNumber'] . "</td>";
                        echo "<td>" . $row['ICnumber'] . "</td>";
                        echo "<td>" . $row['birthDate'] . "</td>";

                        $customerS = $row['email'];

                        echo '<td><form action="../AdminEntry.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">';
                        echo '<input type="hidden" name="emailToDelete" 
												value="' . $customerS . '" >';
                        echo '<button type="submit" value="Delete Customer" 
												name="deleteCustomer" class="btn btn-icon btn-danger">
												<i class="fas fa-times"><h7> Delete <h7></i></button>';
                        echo '</form></td>';

                        echo '<td><form action="editCustomer.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">';
                        echo '<input type="hidden" name="customerToUpdate" 
												value="' . $customerS . '" >';
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
                </div>
              </div>

            </div>
        </section>
      </div>
    </div>
    </ <!-- partial:../../partials/_footer.html -->
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
