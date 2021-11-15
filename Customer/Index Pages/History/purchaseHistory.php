<?php
$con = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' ");
$row = mysqli_fetch_array($query);
?>


<!-- PAGE FOR MY PROFILE CUSTOMER -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Purchased Medicine | CliniCare</title>
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
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- History CSS File -->
  <link href="history.css" rel="stylesheet">


</head>
<style>
  button:focus,
  input:focus,
  textarea:focus,
  select:focus {
    outline: none;
  }

  .tabs {
    display: block;
    display: -webkit-flex;
    display: -moz-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    -moz-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0;
    overflow: hidden;
  }

  .tabs [class^="tab"] label,
  .tabs [class*=" tab"] label {
    color: black;
    cursor: pointer;
    display: block;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1em;
    padding: 2rem 0;
    text-align: center;
  }

  .tabs [class^="tab"] [type="radio"],
  .tabs [class*=" tab"] [type="radio"] {
    border-bottom: 1px solid rgba(239, 237, 239, 0.5);
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: block;
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  .tabs [class^="tab"] [type="radio"]:hover,
  .tabs [class^="tab"] [type="radio"]:focus,
  .tabs [class*=" tab"] [type="radio"]:hover,
  .tabs [class*=" tab"] [type="radio"]:focus {
    border-bottom: 1px solid #1977cc;
  }

  .tabs [class^="tab"] [type="radio"]:checked,
  .tabs [class*=" tab"] [type="radio"]:checked {
    border-bottom: 2px solid #1977cc;
  }

  .tabs [class^="tab"] [type="radio"]:checked+div,
  .tabs [class*=" tab"] [type="radio"]:checked+div {
    opacity: 1;
  }

  .tabs [class^="tab"] [type="radio"]+div,
  .tabs [class*=" tab"] [type="radio"]+div {
    display: block;
    opacity: 0;
    padding: 2rem 0;
    width: 90%;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  .tabs .tab-2 {
    width: 50%;
  }

  .tabs .tab-2 [type="radio"]+div {
    width: 200%;
    margin-left: 200%;
  }

  .tabs .tab-2 [type="radio"]:checked+div {
    margin-left: 0;
  }

  .tabs .tab-2:last-child [type="radio"]+div {
    margin-left: 100%;
  }

  .tabs .tab-2:last-child [type="radio"]:checked+div {
    margin-left: -100%;
  }
  table {
	 border-spacing: 1;
	 border-collapse: collapse;
	 background: white;
	 border-radius: 6px;
	 overflow: hidden;
	 width: 100%;
	 margin: 0 auto;
	 position: relative;
}
 table * {
	 position: relative;
}
 table td, table th {
	 padding-left: 8px;
}
 table thead tr {
	 height: 60px;
	 background: #f1f7fd;
	 font-size: 16px;
}
 table tbody tr {
	 height: 48px;
	 border-bottom: 1px solid #e3f1d5;
}
 table tbody tr:last-child {
	 border: 0;
}
 table td, table th {
	 text-align: left;
}
 table td.l, table th.l {
	 text-align: right;
}
 table td.c, table th.c {
	 text-align: center;
}
 table td.r, table th.r {
	 text-align: center;
}
 @media screen and (max-width: 35.5em) {
	 table {
		 display: block;
	}
	 table > *, table tr, table td, table th {
		 display: block;
	}
	 table thead {
		 display: none;
	}
	 table tbody tr {
		 height: auto;
		 padding: 8px 0;
	}
	 table tbody tr td {
		 padding-left: 45%;
		 margin-bottom: 12px;
	}
	 table tbody tr td:last-child {
		 margin-bottom: 0;
	}
	 table tbody tr td:before {
		 position: absolute;
		 font-weight: 700;
		 width: 40%;
		 left: 10px;
		 top: 0;
	}
}
 
</style>

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
      <a href="#hero" class="logo me-auto">
        <img src="../assets/img/gambar/logobanner.png" alt="" class="img-fluid">
      </a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" class="nav-link scrollto active" href="../../CustomerHomePage/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">About</a></li>
          <li class="dropdown"><a class="nav-link scrollto" href="#" class="play-btn"><span class="d-none d-md-inline">Services</span></a>
            <ul>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/primaryCare.php">Primary Care</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/checkup.php">Medical Check-Up</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/smoking.php">Smoking Cessation</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/pharmacy.php">Pharmacy</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/services/covid.php">Covid-19 Centre</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">FAQ</a></li>
          <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Contact Us</a></li>
          <li class="dropdown"><a class="nav-link scrollto active" href="#" class="play-btn"><span class="d-none d-md-inline">Medicine</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/MedicineCatalogueUser.php">Catalogue</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/medicine/viewCart.php">View My Cart</a></li>
              <li><a href="/MasterCliniCare/Customer/Index Pages/History/purchaseHistory.php">Purchase History</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="play-btn"><span class="d-none d-md-inline">
                <?php echo "Hello " . $row['name']; ?></span>
              <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li>
                <a href="/MasterCliniCare/Customer/Index Pages/Profile/myProfile.php">
                  View Profile</a>
              </li>

              <li>
                <a href="/MasterCliniCare/Customer/Index Pages/History/myHistory.php">
                  View History</a>
              </li>

              <li>
                <a href="/MasterCliniCare/Customer/Index Pages/Appointment/AppointmentSlot.php">
                  Make an Appointment</a>
              </li>

              <form action="/MasterCliniCare/Customer/CustomerEntry.php" method="POST">
                <li><a><button type="submit" href="#" style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">Sign Out</button></a></li>
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
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>My history</h2>
        </div>

        <div class="container rounded bg-white mt-5 mb-5">
        <div class="tabs">
          <div class="tab-2">
            <label for="tab2-1">Appointments</label>
            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
            <div>
              <div class="table-wrapper">
                <table class="f1-table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $con = mysqli_connect("localhost", "clinicarecustomer", "customer", "clinicare");
                    $sql = "SELECT appointment.date, appointment.time, appointment.status FROM appointment 
                      INNER JOIN user ON appointment.email = user.email";
                    $result = mysqli_query($con, $sql);
                    $x = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td> $x </td>";
                      echo "<td>" . $row['date'] . "</td>";
                      echo "<td>" . $row['time'] . "</td>";

                      if ($row['status'] == 1) {
                        echo "<td>Confirmed</td>";
                      } else if ($row['status'] == 2) {
                        echo "<td style='color:red'>Cancelled</td>";
                      } else {
                        echo "<td style='color:#4CBB17'>Completed</td>";
                      }
                      echo "</tr>";

                      $x++;
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-2">
            <label for="tab2-2">Two</label>
            <input id="tab2-2" name="tabs-two" type="radio">
            <div>
              <h4>Tab Two</h4>
              <p>Quisque sit amet turpis leo. Maecenas sed dolor mi. Pellentesque varius elit in neque ornare commodo ac non tellus. Mauris id iaculis quam. Donec eu felis quam. Morbi tristique lorem eget iaculis consectetur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean at tellus eget risus tempus ultrices. Nam condimentum nisi enim, scelerisque faucibus lectus sodales at.</p>
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