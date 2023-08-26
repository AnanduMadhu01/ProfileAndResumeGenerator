<?php
session_start();
if($_SESSION['login']!="staff"){
  header("location: ../loginform.php");
}
include_once "../dbactions.php";
$email=$_SESSION['email'];
$sql="SELECT * FROM `logindetails` WHERE `EMAIL`='$email'";
$result = getData($sql);
	if ($result->num_rows > 0) 
	{
    while($row = $result->fetch_assoc()) {
      $name=$row['USERNAME'];
      $_SESSION['name']=$name;
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>profile-<?php echo $name; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/profile.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.7.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style>
  section {
    padding: 20px 0;
    overflow: hidden;
  }  
  .clear{
    clear: both;
  }
  .col-lg-2 a:hover{
    color: red;
  }
</style>
</head>

<body>

  <?php
    if(isset($_POST["btnedit"])){
      header('Location: logout.php');
    }
    $sql="SELECT * FROM `staff_details` WHERE `EMAIL`='$email'";
  	$result = getData($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) {
      $id=$row["STAFF_ID"];
  
  ?>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <div class="editt">
        <a class="nav-link scrollto" data-bs-toggle="collapse" href="#collapsebox" role="button" aria-expanded="false" aria-controls="collapseExample">Edit Profile</a>
        </div>
        <div class="upload">
          <a class="nav-link scrollto" data-bs-toggle="collapse" href="#uploadbox" role="button" aria-expanded="false" aria-controls="collapseExample">Upload Files</a>
        </div>
        <img src="assets/img/profile_pictures/<?php echo $row['PROFILE_IMAGE'];?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php echo $name; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="<?php echo $row['TWITTER_LINK']; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="<?php echo $row['FB_LINK']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="<?php echo $row['INSTA_LINK']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="<?php echo $row['LINKEDIN_LINK']; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?php echo $name; ?></h1>
      <p>I'm <span class="typed" data-typed-items="<?php echo $row["DESIGNATION"];?>"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="profileedit">
      <div class="container">
        <div class="collapse" id="collapsebox">
          <div class="card card-body">
            <?php include_once "profileedit.php";?>
          </div>
        </div>
      </div>
    </section>
    <section id="fileupload">
      <div class="container">
        <div class="collapse" id="uploadbox">
          <div class="card card-body">
            <?php include_once "upload_documents.php";?>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="assets/img/profile_pictures/<?php echo $row['PROFILE_IMAGE'];?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?php echo $name; ?></h3>
            <p class="fst-italic"><?php echo $row['ABOUT'];?></p>
            <div class="row">
            <?php
                  $dplma=$phd=$btc=$mtc="";
                  $qry="SELECT * FROM `qualification_details` WHERE `EMAIL`='$email'";
                  $result = getData($qry);
                  if ($result->num_rows > 0) 
                  {
                      while($row2 = $result->fetch_assoc()) {
                          if( $row2['DIPLOMA'] !=""){
                            $dplma="Deploma";
                          }
                          if( $row2['BTECH'] !=""){
                            $btc="B-Tech";
                          }
                          if( $row2['MTECH'] !=""){
                            $dplma="mtc";
                          }
                          if( $row2['PHD'] !=""){
                            $phd="PHD";
                          }
                  ?>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Designation:</strong> <span><?php echo $row['DESIGNATION'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo $row['DOB'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+91 <?php echo $row['PHONE'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Employee:</strong> <span><?php echo $row['JOB_TYPE'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php echo $row['AGE'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span><?php echo $row['GENDER'];?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span><?php echo $row['GENDER'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $row['EMAIL'];?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Qualifications:</strong> <span><?php echo $dplma." ";echo $btc." "; echo $mtc." "; echo $phd." "; ?></span></li>
                  <?php
                   if( $row2['DIPLOMA'] !=""){
                   ?>
                   <li><i class="bi bi-chevron-right"></i> <strong>Diploma:</strong> <span><a href="assets/pdf/qualifications/<?php echo $row2['DIPLOMA'];?>">View Certificate</a></span></li>
                   <?php
                   }
                  ?>
                  <?php
                   if( $row2['BTECH'] !=""){
                   ?>
                  <li><i class="bi bi-chevron-right"></i> <strong>B-Tech:</strong> <span><a href="assets/pdf/qualifications/<?php echo $row2['BTECH'];?>">View Certificate</a></span></li>
                   <?php
                   }
                  ?>
                  <?php
                   if( $row2['MTECH'] !=""){
                   ?>
                   <li><i class="bi bi-chevron-right"></i> <strong>M-Tech:</strong> <span><a href="assets/pdf/qualifications/<?php echo $row2['MTECH'];?>">View Certificate</a></span></li>
                   <?php
                   }
                  ?>
                  <?php
                   if( $row2['PHD'] !=""){
                   ?>
                   <li><i class="bi bi-chevron-right"></i> <strong>PHD:</strong> <span><a href="assets/pdf/qualifications/<?php echo $row2['PHD'];?>">View Certificate</a></span></li>
                   <?php
                   }
                  ?>
                  <?php
                  }
                }
                  ?>
                </ul>
              </div>
            </div>
            <p></p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    
    <!-- ======= Facts Section ======= -->

     <?php
        $sql1="SELECT * FROM `resumedetails` WHERE `EMAIL`='$email'";
        $result1 = getData($sql1);
          if ($result1->num_rows > 0) 
          { 
            while($row1 = $result1->fetch_assoc()) {
        ?> 

          <section id="edit_resume">
            <div class="container">
              <div class="collapse" id="resumeupdate">
                <div class="card card-body">
                <?php include_once "resume_edit.php";?>
                </div>
              </div>
            </div>
          </section>
          <section id="education">
            <div class="container">
              <div class="collapse" id="add_education">
                <div class="card card-body">
                <?php include_once "education.php";?>
                </div>
              </div>
            </div>
          </section>
          <section id="experience">
            <div class="container">
              <div class="collapse" id="add_experience">
                <div class="card card-body">
                <?php include_once "experience.php";?>
                </div>
              </div>
            </div>
          </section>
          <section id="ed_education">
            <div class="container">
              <div class="collapse" id="edit_education">
                <div class="card card-body">
                <?php include_once "editeducation.php";?>
                </div>
              </div>
            </div>
          </section>
          <section id="ed_experience">
            <div class="container">
              <div class="collapse" id="edit_experience">
                <div class="card card-body">
                <?php include_once "editexperience.php";?>
                </div>
              </div>
            </div>
          </section>
          <section id="projects">
            <div class="container">
              <div class="collapse" id="add_project">
                <div class="card card-body">
                <?php include_once "project.php";?>
                </div>
              </div>
            </div>
          </section>
          <section id="ed_project">
            <div class="container">
              <div class="collapse" id="edit_project">
                <div class="card card-body">
                <?php include_once "editproject.php";?>
                </div>
              </div>
            </div>
          </section> 
    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">
        <div class="col-lg-12">
        <div class="section-title">
          <h2 class="col-lg-2" style="float:left">Resume</h2>
          <span class="col-lg-2"><a class="scrollto" data-bs-toggle="collapse" href="#resumeupdate" role="button" aria-expanded="false">Update</a></span>
          <span ><a class="scrollto" data-bs-toggle="collapse" href="#add_education" role="button" aria-expanded="false">Add Education</a></span>
          <span class="col-lg-2"><a class="scrollto" data-bs-toggle="collapse" href="#edit_education" role="button" aria-expanded="false">Edit Education</a></span>
          <span><a class="scrollto" data-bs-toggle="collapse" href="#add_experience" role="button" aria-expanded="false">Add Experience</a></span>
          <span class="col-lg-2"><a class="scrollto" data-bs-toggle="collapse" href="#edit_experience" role="button" aria-expanded="false">Edit Experience</a></span>
          <span><a class="scrollto" data-bs-toggle="collapse" href="#add_project" role="button" aria-expanded="false">Add Projects</a></span>
          <span class="col-lg-2"><a class="scrollto" data-bs-toggle="collapse" href="#edit_project" role="button" aria-expanded="false">Edit Projects</a></span>
          <div class="clear"></div>
        </div>
        <p>(<a class="col-lg-2" href="resume/resumeformats.php">Download Resume</a>)</p>
          <p>A CV is a document where you highlight your professional experiences and skills to reflect your job fit to the potential employer. 
            The resume title is an important aspect of your CV because an efficient resume title helps you get recognised by potential employers 
            who come across your resume. Before you write a resume title, it may be helpful to go through a few guidelines on how to do so.</p>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
              <h4><?php echo $name;?></h4>
              <p><em><?php echo $row['ABOUT']?></em></p>
            </div>
            <h3 class="resume-title">Address</h3>
            <div class="resume-item">
              <p><em><?php echo $row1['ADDRESS']?></em></p>
              <p><em>Nationality:<?php echo $row1['NATIONALITY']?></em></p>
              <p><em>Email:<?php echo $row1['EMAIL_IN_RESUME']?></em></p>
              <p><em>Phone:<?php echo $row1['PHONE']?></em></p>
              <?php
                if($row1['WEBSITE']!=""){
                  ?>
                  <p><em>Website:<?php echo $row1['WEBSITE']?></em></p>
                  <?php
                }
              ?>
            </div>
            <h3 class="resume-title">HOBBIES</h3>
            <div class="resume-item">
              <p><em><?php echo $row1['HOBBIES']?></em></p>
            </div>
            <h3 class="resume-title">LANGUAGES KNOWN</h3>
            <div class="resume-item">
              <p><em><?php echo $row1['LANGUAGES_KNOWN']?></em></p>
            </div>
            <h3 class="resume-title">PROGRAMMING LANGUAGES KNOWN</h3>
            <div class="resume-item">
              <p><em><?php echo $row1['PROGRAMING_LANGUAGES_KNOWN']?></em></p>
            </div>
            
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Education</h3>
            <?php
              $sql3="SELECT * FROM `educationdetails` WHERE `EMAIL`='$email'";
              $result3 = getData($sql3);
                if ($result3->num_rows > 0) 
                {
                  while($row3 = $result3->fetch_assoc()) {
            ?> 
            <div class="resume-item">
              <h4><?php echo $row3['EDUCATION'];?></h4>
              <h5><?php echo $row3['START_DATE'];?> - <?php echo $row3['END_DATE'];?></h5>
              <p><em><?php echo $row3['INSTITUTE_NAME'];?></em></p>
            </div>
            <?php
                  }
                }
            ?>


            <?php
              $sql4="SELECT * FROM `experiencedetails` WHERE `EMAIL`='$email'";
              $result4 = getData($sql4);
                if ($result4->num_rows > 0) 
                {
                  ?>
                <h3 class="resume-title">Professional Experience</h3>
                  <?php
                  while($row4 = $result4->fetch_assoc()) {
            ?> 
            <div class="resume-item">
              <h4><?php echo $row4['DESIGNATION'];?></h4>
              <h5><?php echo $row4['START_DATE'];?> - <?php echo $row4['END_DATE'];?></h5>
              <p><em>Institute: <?php echo $row4['COMPANY'];?> </em></p> 
            </div>
            <?php
                  }
                }
            ?>

<?php
              $sql15="SELECT * FROM `projectdetails` WHERE `EMAIL`='$email'";
              $result15 = getData($sql15);
                if ($result15->num_rows > 0) 
                {
                  ?>
                <h3 class="resume-title">Accademic Projects</h3>
                  <?php
                  while($row15 = $result15->fetch_assoc()) {
            ?> 
            <div class="resume-item">
              <h4><?php echo $row15['PROJECT_NAME'];?></h4>
              <h5>Year:<?php echo $row15['YEAR'];?></h5>
              <p><em><?php echo $row15['DESCRIPTION'];?> </em></p> 
            </div>
            <?php
                  }
                }
            ?>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->
          <?php
            }
           }
          ?>
   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Profile Generator</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by Batch <span class="blue">2019-2023</span>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php
  }
}
?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>