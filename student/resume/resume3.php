<?php
session_start();
if($_SESSION['login']!="student"){
    header("location: ../loginform.php");
  }
$email=$_SESSION['email'];
include_once "dbactions.php";
//--->get app url > start

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $ssl = 'https';
}
else {
  $ssl = 'http';
}
 
$app_url = ($ssl  )
          . "://".$_SERVER['HTTP_HOST']
          //. $_SERVER["SERVER_NAME"]
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

//--->get app url > end

header("Access-Control-Allow-Origin: *");

?>

<?php
//--->get app url > start

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $ssl = 'https';
}
else {
  $ssl = 'http';
}
 
$app_url = ($ssl  )
          . "://".$_SERVER['HTTP_HOST']
          //. $_SERVER["SERVER_NAME"]
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

//--->get app url > end

header("Access-Control-Allow-Origin: *");

?>


<!DOCTYPE html>
<html>
<head>
	 
	<title> resume </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="This ">

	<meta name="author" content="Code With Mark">
	<meta name="authorUrl" content="http://codewithmark.com">

	<!--[CSS/JS Files - Start]-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 


	<script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resume2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
	integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" 
	crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
  .btn{
    position:fixed;
    top:5%;
    left:90%;
  }
</style>
 

	<script type="text/javascript">
	$(document).ready(function($) 
	{ 

		$(document).on('click', '.btn_print', function(event) 
		{
			event.preventDefault();

			//credit : https://ekoopmans.github.io/html2pdf.js
			
			var element = document.getElementById('container_content'); 

			//easy
			//html2pdf().from(element).save();

			//custom file name
			//html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


			//more custom settings
			var opt = 
			{
			  margin:       0,
			  filename:     'pageContent_'+js.AutoCode()+'.pdf',
			  image:        { type: 'jpeg', quality: 0.98 },
			  html2canvas:  { scale: 2 },
			  jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
			};

			// New Promise-based usage:
			html2pdf().set(opt).from(element).save();

			 
		});

 
 
	});
	</script>

	 
<style>
  .container_content{
    width: 100%;
    padding: 0;
    margin:0;
  }
</style>
</head>
<body>
<?php
    $sql10="SELECT * FROM `resumedetails` WHERE `EMAIL`='$email'";
    $result10 = getData($sql10);
    if ($result10->num_rows > 0) 
    {
        while($row10 = $result10->fetch_assoc()) {
          $sql11="SELECT * FROM `student_details` WHERE `EMAIL`='$email'";
          $result11 = getData($sql11);
          if ($result11->num_rows > 0) 
          {
              while($row11 = $result11->fetch_assoc()) {
               
?> 
<div class="text-center" class="btn" style="padding:20px;">
	<input type="button" id="rep" value="Download" class="btn btn-info btn_print">
</div>


<div class="container_content" id="container_content" >
		

		<div class="invoice-box">


    <div class="col-md-offset-1 col-md-10 test" style="background: #E4E5E9" id="wrapper">
        <div id="header">
            <div>
                <img src="../img/profile_images/<?php echo $row11['PROFILE_IMAGE'];?>" id="image">
            </div>
            <div>
                <h2 id="name"><?php echo $row10['NAME'];?></h2>
                <p id="underline"></p>
                <div class="row">
                    <div class="col-md-5">
                        <h4 id="contacts">CONTACTS</h4>
                            <span id="">Phone:<?php echo $row11['PHONE'];?></span>
                            <span id="">Email:<?php echo $row10['EMAIL_IN_RESUME'];?></a></span>
                    </div>
                </div>    
            </div>
        </div><!--  end header -->
      
    <div class="row">
        <div class="col-md-12">
            <h4 id="exp">SUMMARY</h4>
            <div id="summary">
                <div id="exp1">
                    <div>
                         <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" 
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.536 438.536" style="enable-background:new 0 0 438.536 438.536;"
                            xml:space="preserve">
                            <path d="M433.113,5.424C429.496,1.807,425.215,0,420.267,0H18.276C13.324,0,9.041,1.807,5.425,5.424
                            C1.808,9.04,0.001,13.322,0.001,18.271v401.991c0,4.948,1.807,9.233,5.424,12.847c3.619,3.614,7.902,5.428,12.851,5.428h401.991
                            c4.948,0,9.229-1.813,12.847-5.428c3.614-3.613,5.421-7.898,5.421-12.847V18.271C438.534,13.319,436.73,9.04,433.113,5.424z"/>
                        </svg>
                    </div>
                    <div>
                        <span id="head">About me</span>
                        
                        
                    </div>
                    <div>
                        <p> <?php echo $row11['ABOUT'];?></p>
                        
                            <span class="icon"><i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <span class="text">Name:<?php echo $row10['NAME'];?></span>
                            <br>
                        
                            <span class="icon"><i class="fa fa-venus" aria-hidden="true"></i>
                            </span>
                            <span class="text">Gender:<?php echo $row11['GENDER'];?></span>
                            <br>
                        
                            <span class="icon"><i class="fa fa-address-book-o" aria-hidden="true"></i>
                            </span>
                            <span class="text" >Address:<?php echo $row10['ADDRESS'];?></span>
                            <br>
                            <span class="icon"><i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                            <span class="text">Age:<?php echo $row11['AGE'];?></span>
                            <br>

                            <span class="icon"><i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                            <span class="text">Date Of Birth:<?php echo $row11['DOB'];?></span>
                            <br>
                            <span class="icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                            <span class="text">Nationality: <?php echo $row11['NATIONALITY'];?> </span>
                            <br>
                            <?php if($row11['LINKED_IN']!=""){ ?>
                            <span class="icon"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span>
                            <span class="text">Linkedin:<?php echo $row11['LINKED_IN'];?></span>
                            <br>
                            <?php } ?>
                            <?php if($row10['WEBSITE'] !=""){ ?>
                            <span class="icon"><i class="fa fa-google" aria-hidden="true"></i></span>
                            <span class="text">Website:<?php echo $row10['WEBSITE'];?></span>
                            <br>
                            <?php } ?>
                    </div>
                </div>
                        
            </div>        
                        
        </div>            
    </div>                
    

    <div class="row">
                        <div class="col-md-12">
                            <div id="experience">
            <?php
                 $sql13="SELECT * FROM `educationdetails` WHERE `EMAIL`='$email'";
                 $result13 = getData($sql13);
                 if ($result13->num_rows > 0) 
                 {
                    ?>
                            <h4 id="exp">EDUCATION</h4>
                    <?php
                     while($row13 = $result13->fetch_assoc()) {
                ?>
                <div id="exp1">
                    <div>
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.536 438.536" style="enable-background:new 0 0 438.536 438.536;"
                            xml:space="preserve">
                            <path d="M433.113,5.424C429.496,1.807,425.215,0,420.267,0H18.276C13.324,0,9.041,1.807,5.425,5.424
                            C1.808,9.04,0.001,13.322,0.001,18.271v401.991c0,4.948,1.807,9.233,5.424,12.847c3.619,3.614,7.902,5.428,12.851,5.428h401.991
                            c4.948,0,9.229-1.813,12.847-5.428c3.614-3.613,5.421-7.898,5.421-12.847V18.271C438.534,13.319,436.73,9.04,433.113,5.424z"/>
                        </svg>
                    </div>
                    <div>
                        <span id="head"><?php echo $row13['EDUCATION'];?></span>
                    </div>
                    <div>
                        
                    <h4><?php echo $row13['INSTITUTE_NAME'];?></h4>
                    <h5>From:<?php echo $row13['START_DATE'];?> To: <?php echo $row13['END_DATE'];?></h5><br><hr>
                    </div>
                </div> <!-- end section 1 -->
                
                <?php
                    }
                  }?>   
                  </div>
              </div>
          </div> <!-- end row 1 -->



          <div class="row">
                        <div class="col-md-12">
                            <div id="experience">
            <?php
                 $sql13="SELECT * FROM `projectdetails` WHERE `EMAIL`='$email'";
                 $result13 = getData($sql13);
                 if ($result13->num_rows > 0) 
                 {
                    ?>
                            <h4 id="exp">Accadamic Projects</h4>
                    <?php
                     while($row13 = $result13->fetch_assoc()) {
                ?>
                <div id="exp1">
                    <div>
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.536 438.536" style="enable-background:new 0 0 438.536 438.536;"
                            xml:space="preserve">
                            <path d="M433.113,5.424C429.496,1.807,425.215,0,420.267,0H18.276C13.324,0,9.041,1.807,5.425,5.424
                            C1.808,9.04,0.001,13.322,0.001,18.271v401.991c0,4.948,1.807,9.233,5.424,12.847c3.619,3.614,7.902,5.428,12.851,5.428h401.991
                            c4.948,0,9.229-1.813,12.847-5.428c3.614-3.613,5.421-7.898,5.421-12.847V18.271C438.534,13.319,436.73,9.04,433.113,5.424z"/>
                        </svg>
                    </div>
                    <div>
                        <span id="head"><?php echo $row13['PROJECT_NAME'];?></span>
                    </div>
                    <div>
                        
                    <h5><?php echo $row13['YEAR'];?></h5>
                    <h4><?php echo $row13['DESCRIPTION'];?></h4><br><hr>
                    </div>
                </div> <!-- end section 1 -->
                
                <?php
                    }
                  }?>   
                  </div>
              </div>
          </div> <!-- end row 1 -->




    <div class="row">
        <div class="col-md-12">
            
        <div id="experience">
            <?php
                 $sql12="SELECT * FROM `experiencedetails` WHERE `EMAIL`='$email'";
                 $result12 = getData($sql12);
                 if ($result12->num_rows > 0) 
                 {
                    ?>
                            <h4 id="exp">EXPERIENCE</h4>
                    <?php
                     while($row12 = $result12->fetch_assoc()) {
                ?>
                <div id="exp1">
                    <div>
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" 
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 438.536 438.536" style="enable-background:new 0 0 438.536 438.536;"
                            xml:space="preserve">
                            <path d="M433.113,5.424C429.496,1.807,425.215,0,420.267,0H18.276C13.324,0,9.041,1.807,5.425,5.424
                            C1.808,9.04,0.001,13.322,0.001,18.271v401.991c0,4.948,1.807,9.233,5.424,12.847c3.619,3.614,7.902,5.428,12.851,5.428h401.991
                            c4.948,0,9.229-1.813,12.847-5.428c3.614-3.613,5.421-7.898,5.421-12.847V18.271C438.534,13.319,436.73,9.04,433.113,5.424z"/>
                        </svg>
                    </div>
                    <div>
                        <span id="head"><?php echo $row12['DESIGNATION'];?></span>
                    </div>
                    <div>
                        <h4 id="ent"><?php echo $row12['COMPANY'];?></h4>
                        <h5><?php echo $row12['CITY'];?></h5>
                <h5>From:<?php echo $row12['START_DATE'];?> To: <?php echo $row12['END_DATE'];?></h5><br>
                    </div>
                </div> <!-- end section 1 -->
                <?php
                    }
                  }?> 
                  </div>
                  </div>
              </div> <!-- end row 1 -->


    

<?php if($row10['PROGRAMING_LANGUAGES_KNOWN'] !=""){ ?>
    <div class="row">
        <div class="col-md-12">
            <h4 id="exp">PROGRAMING LANGUAGE</h4>
                <p class="p1"><?php echo $row10['PROGRAMING_LANGUAGES_KNOWN'];?> 
                </p>
            </div>  
        </div>
<?php } ?>
    <?php if($row10['HOBBIES'] != ""){ ?>
    <div class="row">
        <div class="col-md-5">
            <h4 id="exp">HOBBIES</h4>
            <div class="topM">
                <div class="box-1">
                    <ul>
                    <?php echo $row10['HOBBIES'];?>
                    </ul>
                </div>
			</div>
		</div>
    <?php } ?>
    
    <?php if($row10['LANGUAGES_KNOWN'] != ""){ ?>
        <div class="col-md-7">
            <h4 id="exp">LANGUAGE</h4>
            <div id="skills">
                <div id="exp1">
                    <div><?php echo $row10['LANGUAGES_KNOWN'];?></div>
                </div> 
            </div>
        </div>      
    </div>
    <?php } ?>

    <div class="box-3">
        <p id="underline1"></p>
        <footer class="p2">I hereby declare that all the information given above is true and correct to the best of my knowledge</footer>
	</div>
</div>
<?php
              }
            }
        }
    }


?>


</body>
</html>