<?php
include "../../db_conn.php";
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' ");
$row = mysqli_fetch_array($query);
if (!isset($_SESSION['email'])) {
    header("Location: ../../../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acetin Sachet 5g Tablet</title>
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

    <!-- Services CSS File -->
    <link href="services.css" rel="stylesheet">

</head>

<style>
    .btn {
        background-color: #1977cc;
        border-color: #fff;
        color: white;
        width: 50%;
        font-size: 0.8rem;
        margin-top: 4vh;
        padding: 1vh;
        border-radius: 0
    }

    .btn:focus {
        box-shadow: none;
        outline: none;
        box-shadow: none;
        color: white;
        -webkit-box-shadow: none;
        -webkit-user-select: none;
        transition: none
    }

    .btn:hover {
        color: white
    }

    .img-responsive {
        width: 100%;
        height: auto;
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
            <a href="../../CustomerHomePage/index.php" class="logo me-auto">
                <img src="../assets/img/gambar/logobanner.png" alt="" class="img-fluid">
            </a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" class="nav-link scrollto active" href="../../CustomerHomePage/index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">About</a></li>
                    <li class="dropdown"><a  class="nav-link scrollto"><span class="d-none d-md-inline"></span>Services<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="../services/primaryCare.php">Primary Care</a></li>
                            <li><a href="../services/checkup.php">Medical Check-Up</a></li>
                            <li><a href="../services/smoking.php">Smoking Cessation</a></li>
                            <li><a href="../services/momBaby.php">Mom & Baby Care</a></li>
                            <li><a href="../services/pharmacy.php">Pharmacy</a></li>
                            <li><a href="../services/covid.php">Covid-19 Centre</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Doctors</a></li>
                    <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="../../CustomerHomePage/index.php">Contact Us</a></li>
                    <li class="dropdown"><a class="play-btn"><span class="d-none d-md-inline"></span>Medicine<i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="../medicine/MedicineCatalogueUser.php">Catalogue</a></li>
                            <li><a href="../medicine/viewCart.php">View My Cart</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="play-btn"><span class="d-none d-md-inline"></span><?php echo "Hello " . $row['name']; ?><i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="../Profile/myProfile.php">View Profile</a></li>
                            <li><a href="../History/myHistory.php">View History</a></li>
                            <li><a href="../Appointment/AppointmentSlot.php">Make an Appointment</a></li>
                            <form action="../../CustomerEntry.php" method="POST">
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
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Acetin Sachet 5g Tablet</h2>
                </div>

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6">
                                    <div class="white-box text-center"><img src="gambar/Acetin.jpg" class="img-responsive"></div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6">
                                    <h4 class="box-title mt-5" style="font-size:30px;">Product description</h4>
                                    <p>Acetin sachet contains acetylcysteine which is a type of mucolytic medicine, which works by thinning the mucus (phlegm) 
									so that it can be coughed up more easily.</p>
                                    <h2 class="labels">
                                        RM1.70
                                    </h2>

                                    <form action="CartEntry.php" method="post">
                                        <button type="submit" id="med1" name="med1" class="btn btn-primary" style="font-size:17px; color:white; ">
                                            Add to cart
                                        </button>
                                    </form>

                                    <h3 class="box-title mt-5">Directions To Use</h3>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check text-success"></i> Adults and children above 6 years: <strong>2 sachets 3 times a day.</strong></li>
                                        <li><i class="fa fa-check text-success"></i> Children 2-6 years: <strong>2 sachets 2 times a day.</strong></li>
                                    </ul>
                                </div>
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