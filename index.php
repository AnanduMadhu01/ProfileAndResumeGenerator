<?php
session_start();
include_once "dbactions.php"
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Profile Manager</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img id="logoPG" src="assets/img/gallery/Profile-GeneratorTR.png" height="24" alt="..." /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-medium active" aria-current="page" href="#home">Home</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#bottom">About Us</a></li>
              <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#bottom">Contact Us</a></li>
            </ul>
            <form class="ps-lg-5"><a class="btn btn-light order-1 order-lg-0" href="loginform.php">login
                <svg class="bi bi-person-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                </svg></a></form>
          </div>
        </div>
      </nav>
      <section id="home">
        <div class="bg-holder" style="background-image:url(assets/img/gallery/hero.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center min-vh-50 min-vh-sm-75">
            <div class="col-md-5 col-lg-6 order-0 order-md-1"><img class="w-100" src="assets/img/illustrations/hero-header.png" alt="..." /></div>
            <div class="col-md-7 col-lg-6 text-md-start text-center">
              <h1 class="text-light fs-md-5 fs-lg-6">Create Your Profile Here....!</h1>
              <p class="text-light">Get Access To The Full Control Of Your Profile </p><a class="btn btn-light order-1 order-lg-0" href="registrationform.php">Register</a>
            </div>
          </div>
        </div>
      </section>




      <!-- <section> begin ============================-->

      <section class="pt-8">

        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xxl-5 text-center mx-auto">
              <h2>What will you get if you'll join us</h2>
              <p class="mb-4">Provides you with the best website for managing your profile</p>
            </div>
          </div>
          <div class="row align-items-center mt-5">
            <div class="col-md-5 col-lg-6 order-md-1 order-0"><img style="border-radius: 60%; width: 60%; max-height: 50%;" class="w-1000" src="assets/img/gallery/aaa.png" alt="" /></div>
            <div class="col-md-7 col-lg-6 pe-lg-4 pe-xl-7">
              <div class="d-flex align-items-start"><img class="me-4" src="assets/img/icons/give-a-care.png" alt="" width="30" />
                <div class="flex-1">
                  <h5>WE GIVE </h5>
                  <p class="text-muted mb-4">Beside the support we provide you with various tools to update, edit and view your profile</p>
                </div>
              </div>
              <div class="d-flex align-items-start"><img class="me-4" src="assets/img/icons/tweak-as-you.png" alt="" width="30" />
                <div class="flex-1">
                  <h5>TWEAK AS YOU WISH</h5>
                  <p class="text-muted mb-4">Be able to customize your profile and resume according to your wish.</p>
                </div>
              </div>
              <div class="d-flex align-items-start"><img class="me-4" src="assets/img/icons/security.png" width="30" alt="..." />
                <div class="flex-1">
                  <h5>SECURITY AT ITS BEST</h5>
                  <p>We are providing high security over each individual profile, ready to give you a helping hand the fastest way possible 24/7</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
        
      <!-- <section> begin ============================-->
      <section class="pt-8 bg-soft-primary">

        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xxl-5 text-center mx-auto mb-5">
              <h2>Don't know where to start from?</h2>
              <p class="mb-5">We've got the best articles,tools and resources to help you to start</p>
            </div>
          </div>
          <div class="row h-100">
            <div class="col-md-6 mb-5 mb-md-0 h-100">
              <div class="card card-span bg-primary h-100">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between"><img class="mb-3" src="assets/img/icons/rocket.png" height="80" alt="..." /><img src="assets/img/icons/clouds-1.png" height="90" alt="..." /></div>
                  <h5 class="text-light">PLANING TO REGISTER IN OUR WEBSITE</h5>
                  <p class="text-light lh-lg">You want to build a new profile but not sure what to start with? We've prepared a step by step guide for you to handle the whole process from design to launch </p>
                  <div class="text-end"><a class="btn btn-light" href="registrationform.php" role="button">REGISTER NOW
                      <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                      </svg></a></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 h-100">
              <div class="card bg-secondary card-span h-100">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between"><img class="mb-3" src="assets/img/icons/servion.png" height="80" alt="..." /><img src="assets/img/icons/logos.png" height="90" alt="..." /></div>
                  <h5 class="text-light">WANT TO LOGIN TO YOUR REGISTEARED PROFILE?</h5><br>
                  <p class="text-light lh-lg">Already have an existing profile and trying for logging in....? <br> We will help you. </p>
                  <div class="text-end"><a class="btn btn-light" href="loginform.php"role="button">LOGIN NOW
                      <svg class="bi bi-chevron-right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                      </svg></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-6" id="pricingTable">

        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xxl-5 text-center mx-auto mb-5">
              <h2>Types of Resume that we provide</h2>
              <p class="mb-5">Our service is always affordable for everyone. </p>
            </div>
          </div>
          <div class="row h-100">
            <div class="col-sm-6 col-xl-4 mb-4">
              <div class="card card-span shadow py-4 h-100 border-top border-4 border-primary">
              <img src="assets/img/resume3.png" alt="resume image">
              </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-4">
              <div class="card card-span shadow py-4 h-100 border-top border-4 border-primary">
              <img src="assets/img/resume2.png" alt="resume image">
              </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-4">
              <div class="card card-span shadow py-4 h-100 border-top border-4 border-primary">
                 <img src="assets/img/resume1.png" alt="resume image">
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->

      <section class="py-0 py-xxl-6" id="help">
        <div class="bg-holder" style="background-image:url(assets/img/gallery/footer-bg.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container" id="bottom">
          <div class="row min-vh-75 min-vh-xl-50 pt-10">
            <div class="col-12 col-md-4 col-xl-3 mb-3">
              <h5 class="lh-lg fw-bold text-white">ABOUT US</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-200 text-decoration-none" href="#!">The Profile Generator helps the user to create their profile and generates their resume by just one clicks.</a></li>
              </ul>
            </div>
            <div class="col-12 col-md-4 col-xl-3 mb-3">
            </div>
            <div class="col-6 col-md-4 col-xl-3 mb-3">
              <h5 class="lh-lg fw-bold text-white">IMPORTANT LINKS</h5>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-200 text-decoration-none" href="#top">Home</a></li>
                <li class="lh-lg"><a class="text-200 text-decoration-none" href="admin_login.php">Admin Login</a></li>
              </ul>
            </div>
            <div class="col-xl-3 mb-3">
              <h5 class="lh-lg fw-bold text-white">CONTACT US</h5>
              
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li style="color:#fff">Government Engineering College</li>
                <li style="color:#fff">Painavu, Idukki,</li>
                <li style="color:#fff">Kerala - 685603, India.</li>
                <li style="color:#fff">Phone: 04862-233250/232477</li>
                <li style="color:#fff">Fax : 04862-232477</li>
                <li style="color:#fff">Email: info@gecidukki.ac.in</li>
              </ul>
            </div>
          </div>
          <hr />
          <div class="row flex-center pb-3">
            <div class="col-md-6 order-0">
              <p class="text-200 text-center text-md-start">All rights Reserved &copy; 2019 - 2023 Batch</p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <!--    JavaScripts-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- <script src="assets/js/loginform.js"></script> -->
  </body>

</html>