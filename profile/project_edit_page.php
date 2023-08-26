<?php
session_start();
if($_SESSION['login']!="staff"){
  header("location: ../loginform.php");
}
?>
<?php
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
  <link href="assets/img/apple-touch-icon.png
  " rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/profile.css">
<link rel="stylesheet" href="assets/css/editprofile.css">

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
          <a href="profile.php" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="profile.php" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="profile.php" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="profile.php" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="profile.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="profile.php #about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="profile.php #resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Logout</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <main id="main">
  <div class="card card-body">
  <?php
  $id=$_GET["id"];
  $error="";
  $company="";
  $city="";
  $start="";
  $end="";
  
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $project=$_POST["project"];
    $year=$_POST["year"];
    $description=$_POST["dis"];
        if($project=="" || $year=="" || $description=="")
        {
            $error="Please enter all the field";
        }
        else{
            $qry="UPDATE `projectdetails` SET `PROJECT_NAME`='$project',`YEAR`='$email',`DESCRIPTION`='$description' WHERE `ID`='$id'";
            if(setData($qry)==true)
           {
            ?>
              <script>
                      swal({
                      title: "Datas Inserted Successfully!",
                      text: "You can view in your profile!",
                      icon: "success",
                      button: "OK"
                  });
                  window.onclick = myFunction;
                  function myFunction() {
                    window.location.href = "profile.php #resume";
                      }
              </script>
            <?php
            }
        }
    } 
        
    $sql1="SELECT * FROM `projectdetails` WHERE `ID`='$id'";
              $result1 = getData($sql1);
                if ($result1->num_rows > 0) 
                {
                  while($row1 = $result1->fetch_assoc()) {
    
    ?>
    <div class="box">
        <div class="header">
            <p>Project Details</p>
        </div>
        
        <form method="POST">
            <div class="row">
                <div class="col-3">
                    <p>Project Name</p>
                </div>
                <div class="col-8">
                    <input name="project" type="text" value="<?php echo $row1['PROJECT_NAME'];?>" required           >
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Year</p>
                </div>
                <div class="col-4">
                    <input name="year" type="month" value="<?php echo $row1['YEAR'];?>" required>

                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p>Description</p>
                </div>
                <div class="col-8">
                    <textarea class="textarea" name="dis" required><?php echo $row1['DESCRIPTION'];?></textarea>
                    <small></small>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p></p>
                </div>
                <div class="col-8">
                    <label style="color:red"><?php echo $error;?></label>
                </div>
            </div>

            
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-4">
                    <a href="profile.php #resume" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-danger">Update</button>
                </div>
            </div>

        </form>

    </div>
    <?php
                  }
                }
    ?>
    </div>
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