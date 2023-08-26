<?php
session_start();
if($_SESSION['login']!="student"){
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
  <link href="../profile/assets/img/favicon.png" rel="icon">
  <link href="../profile/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="../profile/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../profile/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../profile/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../profile/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../profile/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../profile/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../profile/assets/css/profile.css">
<link rel="stylesheet" href="../profile/assets/css/editprofile.css">

  <!-- Template Main CSS File -->
  <link href="../profile/assets/css/style.css" rel="stylesheet">

  <!--   -->
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
    $sql="SELECT * FROM `student_details` WHERE `EMAIL`='$email'";
  	$result = getData($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) {
      $id=$row["ID"];
      
  
  ?>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <div class="editt">
        <a  href="profile.php">Edit Profile</a>
        </div>
        <img src="img/profile_images/<?php echo $row['PROFILE_IMAGE'];?>" alt="" class="img-fluid rounded-circle">
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
  
  if(isset($_POST['btnupdexp'])){
    $designation=$_POST["designation"];
    $company=$_POST["companyname"];
    $city=$_POST["cityname"];
    $start=$_POST["start"];
    $end=$_POST["end"];
    $today=date('Y-m-d');
        if($designation=="" || $company=="" || $city=="" || $start=="" || $end=="")
        {
            $error="Please enter all the field";
        }
       elseif($start>$end) 
        {
            $error="Starting date must be less than ending date";
        }
        elseif($start>$today or $end>$today)
        {
            $error="invalid date";
        }
        else{
            $qry="UPDATE `experiencedetails` SET `DESIGNATION`='$designation',`COMPANY`='$company',`CITY`='$city',`START_DATE`='$start',`END_DATE`='$end' WHERE `ID`='$id'";
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
        
    $sql1="SELECT * FROM `experiencedetails` WHERE `ID`='$id'";
              $result1 = getData($sql1);
                if ($result1->num_rows > 0) 
                {
                  while($row1 = $result1->fetch_assoc()) {
    
    ?>
    <div class="box">
        <div class="header">
            <p>Experience Details</p>
        </div>
        
        <form method="POST">
        <div class="row">
                <div class="col-3">
                    <p>Designation</p>
                </div>
                <div class="col-8">
                    <input  name="designation" type="text" value="<?php echo $row1['DESIGNATION'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Company</p>
                </div>
                <div class="col-8">
                    <input  name="companyname" type="text" value="<?php echo $row1['COMPANY'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>City</p>
                </div>
                <div class="col-8">
                    <input name="cityname" type="text" value="<?php echo $row1['CITY'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Date</p>
                </div>
                <div class="col-4">
                    <input style="background-color:#f2f2f2" name="start" type="date" value="<?php echo $row1['START_DATE'];?>">
                    <small style="color:black">Start date</small>
                </div>
                <div class="col-4">
                    <input style="background-color:#f2f2f2" name="end" type="date" value="<?php echo $row1['END_DATE'];?>" class="ml-4">
                    <small style="color:black" class="ml-4">End date</small>
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
                    <a type="button" href="profile.php" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-4">
                    <button type="submit" name="btnupdexp" class="btn btn-danger">Update</button>
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