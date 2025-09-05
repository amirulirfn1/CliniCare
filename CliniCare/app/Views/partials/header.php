<?php
if (!isset($basePath)) {
    $basePath = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome | CliniCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Favicons -->
  <link href="<?= $basePath ?>assets/img/gambar/icon.jpeg" rel="icon">
  <link href="<?= $basePath ?>assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= $basePath ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= $basePath ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?= $basePath ?>assets/css/style.css" rel="stylesheet">

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
      <a href="<?= $basePath ?>" class="logo me-auto"><img src="<?= $basePath ?>assets/img/gambar/logobanner.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>#about">About</a></li>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>#services">Services</a></li>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>#contact">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="<?= $basePath ?>Guest/medicine/MedicineCatalogueGuest">Medicine</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?= $basePath ?>signin"><button class="appointment-btn scrollto">Sign In / Sign Up</button></a>

    </div>
  </header><!-- End Header -->
