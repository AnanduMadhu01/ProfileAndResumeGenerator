<?php
session_start();
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


<!DOCTYPE html>
<html>
<head>
	 
	<title>resume</title>

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
  <link rel="stylesheet" href="resume1.css">
<style>
  .btn{
    position:fixed;
    top:10%;
    left:90%;
  }
  .gg{
    position: relative;
  }
  .td1{
    position: absolute;
    top:0%;
    height: 100%;

  }
  .td2{
    height: 100%;
    margin-top:10px;
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
			  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
			// New Promise-based usage:
      };
			html2pdf().set(opt).from(element).save();
    });
		
	});
	</script>
</head>
<body>
  <?php
      $sql10="SELECT * FROM `resumedetails` WHERE `EMAIL`='$email'";
      $result10 = getData($sql10);
      if ($result10->num_rows > 0) 
      {
          while($row10 = $result10->fetch_assoc()) {
            $sql11="SELECT * FROM `staff_details` WHERE `EMAIL`='$email'";
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
        <table width="700px" height="800px" align="center">
          <tr class="gg">
              <td class="td1" width="250px" bgcolor="1C2833" style="color: white; padding: 20px;">
                  <img  src="../assets/img/profile_pictures/<?php echo $row11['PROFILE_IMAGE'];?>" alt="profile image">
                  <h1> personal details</h1><hr>
                  <p><b> Name:</b> <br>
                      <?php echo $row10['NAME'];?><br><br>

                    <b> Address:</b> <br>
                      <?php echo $row10['ADDRESS'];?><br><br>


                    <b> Phone Number:</b><br>
                    <?php echo $row10['PHONE'];?><br><br>

                      <b>Age:</b><br>
                      <?php echo $row11['AGE'];?><br><br>
                      <b>Date Of Birth:</b><br>
                      <?php echo $row11['DOB'];?><br><br> 
                      <b>Gender:</b><br>
                      <?php echo $row11['GENDER'];?><br><br>
                    
                      
                      <b>Nationality:</b><br>
                      <?php echo $row10['NATIONALITY'];?> <br><br>
                      

                    <b> Email Address:</b> <br>
                    <?php echo $row10['EMAIL_IN_RESUME'];?><br><br>
                    <?php
                    if($row11['LINKEDIN_LINK'] !=""){
                    ?>
                    <b> Linkedin:</b> <br>
                    <?php echo $row11['LINKEDIN_LINK'];?><br><br>
                    <?php  }  
                    if($row10['WEBSITE']!= ""){
                    ?>
                      <b> Website:</b> <br>
                      <?php echo $row10['WEBSITE'];?><br><br>
                    <?php  }?>

                  </p>

                  <h2>Languages</h2>
                  <p>
                  <?php echo $row10['LANGUAGES_KNOWN'];?>
                </p>
                <?php
                    if($row10['HOBBIES'] !=""){
                    ?>  
                  <h2>Hobbies</h2> <hr>
                  <p>
                  <?php echo $row10['HOBBIES'];?>
                    </p>
                  <?php
                    }?>

                  <?php
                    if($row10['PROGRAMING_LANGUAGES_KNOWN'] !=""){
                  ?>
                  <h2>Programing languages</h2> <hr>
                  <p>
                  <?php echo $row10['PROGRAMING_LANGUAGES_KNOWN'];?>  
                    </p>
                  <?php  } ?>
              </td>
              
              <td class="td2" width="450px" bgcolor="#FDFEFE" style="padding: 10px;">
                  <h1><?php echo $row10['NAME'];?></h1> <hr> 
                  <p>
                  <?php echo $row11['ABOUT'];?>
                  </p>
                  
                  <?php
                  $sql12="SELECT * FROM `experiencedetails` WHERE `EMAIL`='$email'";
                  $result12 = getData($sql12);
                  if ($result12->num_rows > 0) 
                  {
                    ?>
                    <h2>Work Experience</h2> <hr>
                    <?php
                      while($row12 = $result12->fetch_assoc()) {
                  ?>
                  <h3><?php echo $row12['DESIGNATION'];?></h3>
                  <h4><?php echo $row12['COMPANY'];?></h4>
                  <h5><?php echo $row12['CITY'];?></h5>
                  <h5>From:<?php echo $row12['START_DATE'];?> To: <?php echo $row12['END_DATE'];?></h5><hr>
                      <?php
                      }
                    }?> 
                      
                      
                  <?php
                  $sql13="SELECT * FROM `educationdetails` WHERE `EMAIL`='$email'";
                  $result13 = getData($sql13);
                  if ($result13->num_rows > 0) 
                  {
                    ?>
                    <h2>Education and Qualifications</h2><hr>
                    <?php
                      while($row13 = $result13->fetch_assoc()) {
                  ?>
                  <h3><?php echo $row13['EDUCATION'];?></h3>
                  <h4><?php echo $row13['INSTITUTE_NAME'];?></h4>
                  <h5>From:<?php echo $row13['START_DATE'];?> To: <?php echo $row13['END_DATE'];?></h5><hr>
                      <?php
                      }
                    }
                    ?>

                  <?php
                  $sql14="SELECT * FROM `projectdetails` WHERE `EMAIL`='$email'";
                  $result14 = getData($sql14);
                  if ($result14->num_rows > 0) 
                  {
                    ?>
                    <h2>Accademic Projects</h2><hr>
                    <?php
                      while($row14 = $result14->fetch_assoc()) {
                  ?>
                  <h3><?php echo $row14['PROJECT_NAME'];?></h3>
                  <h4>Year:<?php echo $row14['YEAR'];?></h4>
                  <h5><?php echo $row14['DESCRIPTION'];?></h5><hr>
                      <?php
                      }
                    }
                    ?>

                    
                   
                  <ul>
                    <div class="box-3"><hr>
                      <footer class="p2">I hereby declare that all the information given above is true and correct to the best of my knowledge</footer>
                    </div>
                  </ul>
              </td>
          </tr>
      </table>
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