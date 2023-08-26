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
	<link rel="stylesheet" href="resume3.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resume2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
	integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" 
	crossorigin="anonymous" referrerpolicy="no-referrer" />
  

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
  .btn{
    position:fixed;
    top:5%;
    left:90%;
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
<div class="text-center" style="padding:20px;">
<input type="button" id="rep" value="Download" class="btn btn-info btn_print">
</div>


<div class="container_content" id="container_content" >
		

		<div class="invoice-box">
			

		<div class="resume">
   <div class="resume_left">
     <div class="resume_profile">
       <img src="../img/profile_images/<?php echo $row11['PROFILE_IMAGE'];?>" alt="profile_pic">
     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold"><?php echo $row10['NAME'];?></p>
           <p class="regular"></p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fa fa-home"></i>
             </div>
             <div class="data">
             <?php echo $row10['ADDRESS'];?><br />
             </div>
           </li>


           <li>
             <div class="icon">
               <i class="fa fa-genderless"></i>
             </div>
             <div class="data">
               Gender:<?php echo $row11['GENDER'];?>
             </div>
           </li>

           <li>
             <div class="icon">
               <i class="fa fa-calendar"></i>
             </div>
             <div class="data">
               Age: <?php echo $row11['AGE'];?>
             </div>
           </li>

           <li>
             <div class="icon">
               <i class="fa fa-calendar"></i>
             </div>
             <div class="data">
              DOB:<?php echo $row11['DOB'];?>
             </div>
           </li>

           <li>
             <div class="icon">
               <i class="fa fa-flag"></i>
             </div>
             <div class="data">
              Nationality:<?php echo $row11['NATIONALITY'];?>
             </div>
           </li>



           <li>
             <div class="icon">
               <i class="fa fa-phone"></i>
             </div>
             <div class="data">
             <?php echo $row11['PHONE'];?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i style="padding:5px;"class="fa fa-envelope"></i>
             </div>
             <div class="data">
             <?php echo $row10['EMAIL_IN_RESUME'];?>
             </div>
           </li>
                <?php
                if($row10['WEBSITE'] !=""){
                ?>
           <li>
             <div class="icon">
               <i class="fa fa-globe"></i>
             </div>
             <div class="data">
             <?php echo $row10['WEBSITE'];?>
             </div>
           </li>
           <?php
                }
           ?>
           
         </ul>
       </div>

       <?php if($row10['PROGRAMING_LANGUAGES_KNOWN'] != ""){ ?>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">Programing languages</p>
         </div>
         <ul>
           <li>
             <div class="skill_name">
             <?php echo $row10['PROGRAMING_LANGUAGES_KNOWN'];?> 
             </div>
           </li>
         </ul>
       </div>
       <?php } ?>
        <?php if($row10['LANGUAGES_KNOWN'] != ""){?>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">Languages</p>
         </div>
         <ul>
           <li>
             <div class="skill_name">
             <?php echo $row10['LANGUAGES_KNOWN'];?>
             </div>
           </li>
         </ul>
       </div>
       <?php } ?>



       <div class="resume_item resume_social">
         <div class="title">
           
         </div>
        
       </div>
     </div>
  </div>
  <div class="resume_right">
    <div class="resume_item resume_about">
        <div class="title">
           <p class="bold">About</p>
         </div>
        <p><?php echo $row11['ABOUT'];?></p>
    </div>
    
    <div class="resume_item resume_education">
            <ul>
        <?php
          $sql13="SELECT * FROM `educationdetails` WHERE `EMAIL`='$email'";
          $result13 = getData($sql13);
          if ($result13->num_rows > 0) 
          {
          ?>
          
            <div class="title">
                <p class="bold">Education</p>
              </div>
              <?php
                while($row13 = $result13->fetch_assoc()) {
              ?>
              <li>
                <div class="date"><?php echo $row13['EDUCATION'];?></div> 
                <div class="info">
                     <p class="semi-bold"><?php echo $row13['INSTITUTE_NAME'];?></p> 
                    <p>From:<?php echo $row13['START_DATE'];?> To: <?php echo $row13['END_DATE'];?></p>
                </div>
              </li>
            <?php
                     }
            ?>
            </ul>
            </div>
            <?php }?>
            

            
            <?php
          $sql13="SELECT * FROM `projectdetails` WHERE `EMAIL`='$email'";
          $result13 = getData($sql13);
          if ($result13->num_rows > 0) 
          {
          ?>
          <div class="resume_item resume_education">
            <div class="title">
                <p class="bold">Accademic Projects</p>
              </div>
            <ul>
              <?php
                while($row13 = $result13->fetch_assoc()) {
              ?>
              <li>
                <div class="date"><?php echo $row13['PROJECT_NAME'];?></div> 
                <div class="info">
                     <p class="semi-bold">Year:<?php echo $row13['YEAR'];?></p> 
                    <p><?php echo $row13['DESCRIPTION'];?></p>
                </div>
              </li>
            <?php
                     }
            ?>
            </ul>
          </div>
          <?php  } ?>

             
                    
              
              <?php
                 $sql12="SELECT * FROM `experiencedetails` WHERE `EMAIL`='$email'";
                 $result12 = getData($sql12);
                 if ($result12->num_rows > 0) 
                 {
                  ?>
                  <div class="resume_item resume_work">
                    <div class="title">
                      <p class="bold">Work Experience</p>
                    </div>
                    <ul>
                      <?php
                        while($row12 = $result12->fetch_assoc()) {
                      ?>
                      <li>
                        <div class="date"><?php echo $row12['DESIGNATION'];?></div> 
                        <div class="info">
                          <p class="semi-bold"><?php echo $row12['COMPANY'];?></p> 
                          <p class="semi-bold"><?php echo $row12['CITY'];?></p>
                          <p>From:<?php echo $row12['START_DATE'];?> To: <?php echo $row12['END_DATE'];?></p>
                        </div>
                      </li>
            <?php
                     }
            ?>
            </ul>
          </div>
          <?php } ?>
    
      <?php
      if($row10['HOBBIES'] != ""){
      ?>
      <div>
      <div class="title">
           <p class="bold">Hobby</p>
      </div>
      <ul>
       <?php echo $row10['HOBBIES'];?>
      </ul>
    </div>
      <?php  } ?>
    <div class="box-3">
      <hr>
        <footer class="p2">I hereby declare that all the information given above is true and correct to the best of my knowledge</footer>
	</div>
  </div>
  
</div>


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