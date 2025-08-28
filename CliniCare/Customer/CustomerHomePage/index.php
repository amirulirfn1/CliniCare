<?php
include "../db_conn.php";
session_start();
$email = $_SESSION['email'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE email='$email' ");
$row = mysqli_fetch_array($query);
//if session is not set, then go to login page
if (!isset($_SESSION['email'])) {
  header("Location: ../../index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home | CliniCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/gambar/icon.jpeg" rel="icon">
  <link href="assets/img/gambar/icon.jpeg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
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
        <a href="https://twitter.com/klinikdamai?s=20/" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/klinikdamaikualaselangor24jam/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/klinikdamaikualaselangor24jam/" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="assets/img/gambar/logobanner.png" alt="CliniCare logo" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0" role="navigation" aria-label="Main Navigation">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li class="dropdown"><a class="nav-link scrollto"><span class="d-none d-md-inline"></span> Services<i class="bi bi-chevron-right"></i> </a>
            <ul>
              <li><a href="../Index Pages/services/primaryCare.php">Primary Care</a></li>
              <li><a href="../Index Pages/services/checkup.php">Medical Check-Up</a></li>
              <li><a href="../Index Pages/services/smoking.php">Smoking Cessation</a></li>
              <li><a href="../Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
              <li><a href="../Index Pages/services/pharmacy.php">Pharmacy</a></li>
              <li><a href="../Index Pages/services/covid.php">Covid-19 Centre</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li class="dropdown"><a class="play-btn"><span class="d-none d-md-inline"></span>Medicine <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../Index Pages/medicine/MedicineCatalogueUser.php">Catalogue</a></li>
              <li><a href="../Index Pages/medicine/viewCart.php">View My Cart</a></li>
            </ul>
          </li>

          <li class="dropdown"><a class="play-btn"><span class="d-none d-md-inline"></span><?php echo "Hello " . $row['name']; ?><i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="../Index Pages/Profile/myProfile.php">View Profile</a></li>
              <li><a href="../Index Pages/History/myHistory.php">View History</a></li>
              <li><a href="../Index Pages/Appointment/AppointmentSlot.php">Make an Appointment</a></li>
              <form action="../CustomerEntry.php" method="POST">
                <li>
                  <a><button type="submit" href="#" style="background: transparent; border: none; padding: 0; margin:0; position:relative; color:red" name="signout">
                      Sign Out</button></a>
                </li>
              </form>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle" role="button" aria-label="Toggle navigation"></i>
      </nav><!-- .navbar -->

    </div>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to CliniCare</h1>
      <h2>I Care, You Care, We Care</h2>
      <a href="#about" class="btn-get-started scrollto">Get To Know Us</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose CliniCare?</h3>
              <p>
                We are a team that is committed to the highest standards of patient care by providing quality healthcare
                services,
                advanced technology and facilities, ensuring the best care for today’s patients and future generations.
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="assets/img/icons/iconSecurity.png" class="img-fluid" alt="Security shield icon"></i>
                    <br><br>
                    <h4>Safety is our priority.</h4>
                    <p>When you visit CliniCare, you will receive the most up-to-date safety standards and medical
                      practises.</p>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="assets/img/icons/icon24.png" class="img-fluid" alt="24-hour service icon"></i>
                    <br><br>
                    <h4>24/7 Care</h4>
                    <p>Live help available 24/7.</p>
                  </div>
                </div>

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i><img src="assets/img/icons/iconExpert.png" class="img-fluid" alt="Expert staff icon"></i>
                    <br><br>
                    <h4>Professional staff</h4>
                    <p>All the team experts at what they do</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 picture-box d-flex justify-content-center align-items-stretch position-relative">
            <img src="assets/img/gambar/gambar11.jpeg" class="img-fluid" alt="Clinic interior">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Who we are ?</h3>
            <p>Welcome to Clinicare, your trusted medical aesthetic clinic in Malaysia</p>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-hand-holding-heart"></i></div>
              <h4 class="title"><a href="">INTEGRATED PRIMARY CARE PROVIDER</a></h4>
              <p class="description">CliniCare has developed an excellent reputation and a
                comprehensive clinical practise over the years.
                We have proceeded to restructure our medical care facilities and services
                in order to give a higher-quality healthcare solution.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-headset"></i></div>
              <h4 class="title"><a href="">AVANT-GARDE INTELSYS SUPPORT SYSTEM</a></h4>
              <p class="description">CliniCare is dedicated to developing a cutting-edge support system
                and a reliable infrastructure that will provide our partners with medical options.
                IntelSys' arrangement gives safe access to shared patient information
                and medical histories.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="fas fa-users-cog"></i></div>
              <h4 class="title"><a href="">THE FOOT PRINT</a></h4>
              <p class="description">CCG continues to expand its brand offering through fruitful collaboration with our panels and securing
                over 200 corporate and government clienteles. The primary care has successfully garnered over one million
                patient. On average, our clinics receives visits of 50 to 300 patients per day.
                The group is still growing. </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p> We are constantly concerned about your family. </p>
          <p> For patients in our service area as well as the community, we provide a wide variety of services and
            specialist health care services. </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="../Index Pages/services/primaryCare.php">Primary Care</a></h4>
              <p>Screening and treatment, as well as therapy for mild symptoms, common diseases, and injuries.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-stethoscope"></i></div>
              <h4><a href="../Index Pages/services/checkup.php">Medical Check-Up</a></h4>
              <p>Monthly check up for Klinik Damai's patient. Physical examinations, blood and urine tests, and X-ray
                examinations are all possible</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-smoking"></i></div>
              <h4><a href="../Index Pages/services/smoking.php">Smoking Cessation Campaign</a></h4>
              <p>Smoking cessation programmes are meant to assist people who want to quit smoking cigarettes and other
                tobacco-based products.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-baby"></i></div>
              <h4><a href="../Index Pages/services/momBaby.ph">Mom & Baby Care</a></h4>
              <p>Offers medical care to all pregnant women and their children.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="../Index Pages/services/pharmacy.php">Pharmacy</a></h4>
              <p>Our Pharmacists are here to help and guide about any basis medicine that you need</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-viruses"></i></div>
              <h4><a href="../Index Pages/services/covid.php">Covid-19 Centre</a></h4>
              <p>Swab Test and Vaccination for COVID-19. Get covid 19 swab test and get result in 24 hours</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Doctors Of CliniCare</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/gambar/doctor1new.jpg" class="img-fluid" alt="Doctor portrait 1"></div>
              <div class="member-info">
                <h4>Dr. Hafiz</h4>
                <span>Chief Medical Officer</span>
                <p>Sometimes, prayer is the best medicine. </p>
                <!-- <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div> -->
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/gambar/doctor7copy.jpg" class="img-fluid" alt="Doctor portrait 2"></div>
              <div class="member-info">
                <h4>Dr. Najmudin</h4>
                <span>Anesthesiologist</span>
                <p>Whenever you make a mistake, do it twice</p>
                <!-- <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div> -->
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/gambar/doctor3new.jpg" class="img-fluid" alt="Doctor portrait 3"></div>
              <div class="member-info">
                <h4>Dr. Adila Halwa</h4>
                <span>Cardiology</span>
                <p>Work to save other lives</p>
                <!-- <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div> -->
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/gambar/doctor4copy.jpg" class="img-fluid" alt="Doctor portrait 4"></div>
              <div class="member-info">
                <h4>Dr. Masri</h4>
                <span>Neurosurgeon</span>
                <p>I was born to flex in my white coat</p>
                <!-- <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div> -->
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Do you still have any doubts?
            We have the answers to all the questions you might have</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Are there any side effects after vaccine for COVID-19?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  <strong>A : </strong>Most people don’t have serious side effects after they get vaccinated.
                  Just like with other vaccines, your arm may be red, sore, or warm to the touch.
                  You may also get a headache or a fever, or feel tired and achy for a day or 2.
                  These side effects are very common in people who get COVID-19 vaccines.
                  They’re signs that your body is building up protection — and that means the vaccine is working.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">What if I am pregnant or receiving treatment for an ongoing special condition?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  <strong>A : </strong>Please know that nothing changes for you right now and
                  you can continue scheduling appointments for care as you normally do.
                  We are committed to you and your care.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">I would like to prescribe the same medication as provides by another clinic. Is it possible to receive the medicine only? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  <strong>A : </strong>It is necessary to meet the doctor in order to obtain the medicine,
                  please indicate your desirable medicine to our doctor during the consultation.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Is a reservation necessary for vaccination? How much is the vaccination?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  <strong>A : </strong>We encourage reservation as we do not maintain the stocks
                  for most kind of vaccination due its short preserving period.
                  Please contact us directly for detailed costing.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">How can I stay up-to-date on the negotiations?
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  <strong>A : </strong> We will keep you up-to-date about our ongoing negotiations
                  through this website as new information is available.
                  You can also call 03-3289 6079 to contact our patient advocacy line directly with any questions.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p><strong>Disclaimer :</strong> Each individual’s treatment and/or results may vary. Please consult doctor for more details.</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="Testimonial 1">
                  <h3>Ahmad Megat</h3>
                  <h4>Driver</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Good ethics, kind doctor, affordable, well-informed, and provided me choices for my issues.
                    I will definitely return to the clinic and would not hesitate to suggest them.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="Testimonial 2">
                  <h3>Mia Mirara</h3>
                  <h4>Profesor</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Doktor serta kakitangan di situ baik dan juga sangat profesional.
                    Perkhidmatan dan kemudahan klinik juga sangat baik.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="Testimonial 3">
                  <h3>Nadiana Aminah</h3>
                  <h4>Documentation Master</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    I was really pleased with the service I received. The staff was kind and professional,
                    and they took the time to explain procedures in a clear and transparent manner.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="Testimonial 4">
                  <h3>Irfan Hakim</h3>
                  <h4>Store Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    From the receptionist to the clinician, it was an excellent experience.
                    I felt comforted, and I was given a detailed explanation of the treatment plan and charges.
                    I would strongly suggest it.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="Testimonial 5">
                  <h3>Aiman Tajudin</h3>
                  <h4>Artist</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Damai Clinic has exceeded my expectations.
                    The gastric sleeve at Damai Clinic was the finest decision I've ever made,
                    and it's absolutely changed my life.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="Testimonial 6">
                  <h3>Farrah Ixora</h3>
                  <h4>Restaurant Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Semasa saya pergi ke Klinik Damai untuk mendapatkan imbasan bayi secara terperinci,
                    saya selalu mempunyai masa yang hebat. Pengurusan klinik semasa wabak COVID-19 ini sangat baik.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Our clinic pictures.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar8.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar8.jpg" class="img-fluid" alt="Clinic facility 1">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar9.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar9.jpg" class="img-fluid" alt="Clinic facility 2">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar2.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar2.jpg" class="img-fluid" alt="Clinic facility 3">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar3.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar3.jpg" class="img-fluid" alt="Clinic facility 4">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar4.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar4.jpg" class="img-fluid" alt="Clinic facility 5">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar5.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar5.jpg" class="img-fluid" alt="Clinic facility 6">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar7.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar7.jpg" class="img-fluid" alt="Clinic facility 7">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gambar/gambar10.jpg" class="galelry-lightbox">
                <img src="assets/img/gambar/gambar10.jpg" class="img-fluid" alt="Clinic facility 8">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Locate and contact us now.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.078303187163!2d101.25337731404913!3d3.3308319975752663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ccf49efc5c5433%3A0xdade51eac9523558!2sKlinik%20Damai%20(Kuala%20Selangor)!5e0!3m2!1sen!2smy!4v1630218008842!5m2!1sen!2smy" frameborder="0" allowfullscreen>
        </iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>No. 43 & 45, Jalan Melati 3/17, Bandar Melawati,<br>
                  45000 Kuala Selangor,<br>
                  Selangor<br><br>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@clinicare.com.my</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>03-3289 6079</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <?php
            $Msg = "";
            if (isset($_GET['error'])) {
              $Msg = " Please Fill in the Blanks ";
              echo '<div class="alert alert-danger">' . $Msg . '</div>';
            }

            if (isset($_GET['success'])) {
              $Msg = " Your Message Has Been Sent ";
              echo '<div class="alert alert-success">' . $Msg . '</div>';
            }

            ?>

            <div class="card-body">
              <form action="giveFeedback.php" method="post">
                <input type="text" name="UName" placeholder="User Name" class="form-control mb-2" required>
                <input type="email" name="Email" placeholder="Email" class="form-control mb-2" required>
                <input type="text" name="Subject" placeholder="Subject" class="form-control mb-2" required>
                <textarea name="message" class="form-control mb-2" rows="6" placeholder="Write The Message" required></textarea>
                <button class="btn btn-success" name="btn-send" style="background-color:#1977cc"> Send Feedback </button>
              </form>
            </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>C L I N I C A R E</h3>
            <p>
              No. 43 & 45, Jalan Melati 3/17, Bandar Melawati,<br>
              45000 Kuala Selangor,<br>
              Selangor<br><br>
              <strong>Phone:</strong> 03-3289 6079<br>
              <strong>Email:</strong> info@clinicare.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../Index Pages/services/primaryCare.php">Primary Care</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../Index Pages/services/checkup.php">Medical Check-Up</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../Index Pages/services/smoking.php">Smoking Cessation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../Index Pages/services/momBaby.php">Mom & Baby Care</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../Index Pages/services/pharmacy.php">Pharmacy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../Index Pages/services/covid.php">Covid-19 Centre</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>C L I N I C A R E</span></strong>. All Rights Reserved
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>