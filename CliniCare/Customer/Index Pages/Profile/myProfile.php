<?php
include "../../db_conn.php";
session_start();
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$email = $_SESSION['email'];
$stmt = $con->prepare("SELECT * FROM customer WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
$row = mysqli_fetch_array($res);
if (!isset($_SESSION['email'])) {
  header("Location: ../../../index.php");
  exit;
}

if (isset($_POST['submit'])) {
  $filename = basename($_FILES['file']['name']);
  // Basic sanitization of filename
  $filename = preg_replace('/[^A-Za-z0-9_\.\-]/', '_', $filename);
  move_uploaded_file($_FILES['file']['tmp_name'], "pictures/" . $filename);
  include "../../db_conn.php";
  $up = $con->prepare("UPDATE customer SET image = ? WHERE email = ?");
  $up->bind_param('ss', $filename, $email);
  $up->execute();
  header("refresh:0; url=myProfile.php");
}
?>

<!-- PAGE FOR MY PROFILE CUSTOMER -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>My Profile | CliniCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/gambar/icon.jpeg" rel="icon">
  <link href="../assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <style>
    .error {
      background: #F2DEDE;
      color: #A94442;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      margin: 20px auto;
      font-size: 16px;

    }

    .success {
      background: #D4EDDA;
      color: #40754C;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      margin: 20px auto;
      font-size: 16px;
    }
  </style>
  <script>
    function submitImage() {
      if (document.getElementById("upload").click) {
        document.getElementById("submit").hidden = false;
      } else {
        document.getElementById("submit").hidden = true;
      }
    }
  </script>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:info@clinicare.com.my">info@clinicare.com.my</a>
        <i class="bi bi-phone"></i> 03-3289 6079
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://twitter.com/klinikdamai?s=20" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="../../CustomerHomePage/index.php" class="logo me-auto">
        <img src="../assets/img/gambar/logobanner.png" alt="" class="img-fluid">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">About</a></li>
          <li class="dropdown"><a class="nav-link scrollto"><span class="d-none d-md-inline"></span>Services<i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../../Index Pages/services/primaryCare.php">Primary Care</a></li>
              <li><a href="../../Index Pages/services/checkup.php">Medical Check-Up</a></li>
              <li><a href="../../Index Pages/services/smoking.php">Smoking Cessation</a></li>
              <li><a href="../../Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
              <li><a href="../../Index Pages/services/pharmacy.php">Pharmacy</a></li>
              <li><a href="../../Index Pages/services/covid.php">Covid-19 Centre</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">FAQ</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Contact Us</a></li>
          <li class="dropdown"><a class="play-btn"><span class="d-none d-md-inline"></span>Medicine<i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../../Index Pages/medicine/MedicineCatalogueUser.php">Catalogue</a></li>
              <li><a href="../../Index Pages/medicine/viewCart.php">View My Cart</a></li>
            </ul>
          </li>

          <li class="dropdown"><a class="play-btn"><span class="d-none d-md-inline"></span><?php echo "Hello " . $row['name']; ?><i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../Profile/myProfile.php">View Profile</a></li>
              <li><a href="../History/myHistory.php">View History</a></li>
              <li><a href="../Appointment/AppointmentSlot.php">Make an Appointment</a></li>
              <form action="../../CustomerEntry.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">
                <li>
                  <a><button type="submit" href="#" style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">
                      Sign Out</button></a>
                </li>
              </form>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- MAIN CONTENT -->
  <main id="main">
    <br><br><br><br>

    <!-- ======= Main My Profile Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>My Profile</h2>
        </div>

        <div class="container rounded bg-white mt-5 mb-5">

          <div class="row">
            <div class="col-md-3 border-right">

              <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                <?php

                if ($row['image'] == '') {
                  echo "<img width='200' height='230' src='pictures/default.jpg' alt='Default Profile Pic'>";
                } else {
                  echo "<img width='220' height='230' src='pictures/" . $row['image'] . "' alt='Profile Pic' >";
                }
                ?>

                <div class="col-md-10">
                  <label class="labels" style="font-size: 12px">Edit Profile Picture</label>
                  <div class="upload-btn-wrapper">
                    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">
                      <input id="upload" type="file" name="file" onchange="submitImage()"><br>
                      <input id="submit" type="submit" name="submit" hidden="true">
                    </form>
                  </div>
                </div>

                <hr>

              </div>
            </div>

            <div class="col-md-5 ">
              <div class="py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Personal Info</h4>
                </div>

                <form class="forms-sample" action="../../CustomerEntry.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">

                  <div class="row mt-3">
                    <div class="col-md-12">
                      <label class="labels" style="font-size: 12px">Email</label>
                      <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" disabled>
                    </div>

                    <div class="col-md-12">
                      <br>
                      <label class="labels" style="font-size: 12px">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="col-md-12">
                      <br>
                      <label class="labels" style="font-size: 12px">IC Number</label>
                      <input type="text" class="form-control" placeholder="xxxxxx-xx-xxxx" name="icNumber" id="ICnumber" value="<?php echo $row['ICnumber']; ?>">
                    </div>

                    <div class="col-md-12">
                      <br>
                      <label class="labels" style="font-size: 12px">Contact Number</label>
                      <input type="text" class="form-control" placeholder="xxx-xxxxxxx" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>">
                    </div>

                    <div class="col-md-12">
                      <br>
                      <label class="labels" style="font-size: 12px">Date of Birth</label>
                      <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="birthDate" id="birthDate" value="<?php echo $row['birthDate']; ?>">
                    </div>

                    <div class="col-md-12">
                      <br>
                      <label class="labels" style="font-size: 12px">Address</label>
                      <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                    </div>

                  </div>

                  <div class="mt-4 text-left">
                    <button type="submit" name="update-profile" class="btn btn-primary profile-button">Update Profile</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="col-md-4 border-left">
              <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Password Changes</h4>
                </div>

                <link rel="stylesheet" type="text/css">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                  <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <p class="card-description"></p>

                <form class="form-sample" action="change-p.php" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"]; ?>">
                  <div class="col-md-12">
                    <label class="label" style="font-size: 12px">Current Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="op" aria-label="Username">
                  </div>

                  <br>

                  <div class="col-md-12">
                    <label class="labels" style="font-size: 12px">New Password</label>
                    <input type="password" pattern=".{8,}" class="form-control" name="np" placeholder="New Password" aria-label="Username" title="8 characters minimum">
                  </div>

                  <div class="col-md-12">
                    <br>
                    <label class="labels" style="font-size: 12px">Confirm New Password</label>
                    <input type="password" pattern=".{8,}" class="form-control" name="c_np" placeholder="Confirm New Password" aria-label="Username" title="8 characters minimum">
                  </div>

                  <div class="form-group">
                    <br>
                    <label class="col-sm-0 col-form-label"></label>
                    <button type="submit" class="btn btn-primary profile-button">Change</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color : white">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>C L I N I C A R E</span>
          </strong>. All Rights Reserved
        </div>

      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/klinikdamai?s=20" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
