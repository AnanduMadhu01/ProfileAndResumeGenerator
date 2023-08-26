<?php
session_start();
if($_SESSION['login']!="admin"){
  header("location: ../admin_login.php");
}
include_once "../dbactions.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>profile-<?php echo "admin"; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../profile/assets/img/favicon.png" rel="icon">
  <link href="../profile/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../profile/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../profile/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../profile/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../profile/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../profile/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../profile/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../profile/assets/css/profile.css">

  <!-- Template Main CSS File -->
  <link href="../profile/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../profile/assets/img/profile_pictures/profile-img.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href=""></a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="registrationform.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Staff Registration</span></a></li>
          <li><a href="#viewstaff" class="nav-link scrollto"><i class="bx bx-user"></i> <span>View Staffs</span></a></li>
          <li><a href="#viewstudent" class="nav-link scrollto"><i class="bx bx-user"></i> <span>View Students</span></a></li>
          <li><a href="reset_password.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Reset Password</span></a></li>
          <li><a href="../profile/logout.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?php echo 'Admin'; ?></h1>
      <p>This is:<span class="typed" data-typed-items="Admin Pannel"></span></p>
    </div>
  </section><!-- End Hero -->
  <main id="main">
    <!-- ======= Staff view Section ======= -->
    <section id="viewstaff" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Registeared Staff Details</h2>
        </div>
        <div class="row">
        <div class="card card-body">
            <?php include_once "staff_view.php";?>
          </div>
        </div>
      </div>
    </section>
    <section id="viewstudent" class="about">
      <div class="container">
        <div class="section-title">
          <h2>Registeared Student Details</h2>
        </div>
        <div class="row">
        <div class="card card-body">
            <?php include_once "student_view.php";?>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Profile Generator</span></strong>
      </div>
      <div class="credits">
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by Batch <span class="blue">2019-2023</span>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../profile/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../profile/assets/vendor/aos/aos.js"></script>
  <script src="../profile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../profile/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../profile/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../profile/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../profile/assets/vendor/typed.js/typed.min.js"></script>
  <script src="../profile/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../profile/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../profile/assets/js/main.js"></script>
</body>

</html>