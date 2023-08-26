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
	<meta charset="UTF-8">
	<title>PG registration form</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="../assets/css/loginform.css" rel="stylesheet">
</head>
<body>
  <?php
$_SESSION['username']=$_SESSION['email']='';
$checked="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username= $_POST["txtusername"];
  $_SESSION['username']=$username;
  $email= $_POST["txtemail"];
  $_SESSION['email']=$email;
  $_SESSION['emailaddress']=$email;
	$designation = $_POST["txtdesignstion"];
  $_SESSION['designation']=$designation;
  // if($designation=='staff'){
  //   $checked="checked";
  // }
	$password = $_POST["txtpass"];
  $temppassword = $_POST["txtpass"];
  $repassword = $_POST["txtrepass"];
  $sql="SELECT * FROM `logindetails` WHERE `EMAIL`='$email'";
  $result = getData($sql);
  if ($result->num_rows != 0) 
  {
    ?>
      <script>
        swal({
        title: "Email aldrady exist!!",
        text: "Try again with another Email!",
        icon: "warning",
        button: "OK"
      });
      </script>
      <?php
  }
  else if($username == "" || $email == "" || $designation == "" || $password == "" || $repassword == ""){
    ?>
			<script>
				swal({
				title: "Registration Failed!",
				text: "Please Fill All the fields!",
				icon: "warning",
				button: "OK"
			});
			</script>
			<?php
  } else if($password!=$repassword){
    ?>
			<script>
				swal({
				title: "Registration Failed!",
				text: "Password Missmatch!",
				icon: "warning",
				button: "OK"
			});
			</script>
			<?php
    
  } else{
    $sql = "insert into logindetails (EMAIL, USERNAME, REGISTER_AS, PASSWORD) values ('$email', '$username', '$designation', '$password')";
    if(setData($sql)==true)
      {
        include_once "../mailer.php";
        $mail->setFrom(EMAIL, 'Profile Generator GEC Idukki');
        $mail->addAddress($email);    
        $mail->addReplyTo(EMAIL);
        $mail->isHTML(true);                                  
        $mail->Subject = 'Registration details of Profile Generator';
        $mail->Body    = "<h1>Donot share your password</h1>Congratulations! You have successfully registered in Profile Generator GEC Idukki,
                     <br>Your User Id is <b>".$email."</b><br>Password is:<b>".$temppassword."</b><br>Please note the login details for all further communication 
                     with us.";

        if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          echo 'Message has been sent';
        }
        ?>
			<script>
				swal({
				title: "Registration Successfull!",
				text: "You can Login now!",
				icon: "success",
				button: "OK"
			});
			window.onclick = myFunction;
			function myFunction() {
				location.replace("loginform.php");
				window.location.href = "../php/staff_insert.php";
				}
			</script>
			<?php
      }
  }
}
  ?>
	<div id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-content">
        <div class="user_card">
          <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
              <img src="../assets/img/gallery/Pr.png" class="brand_logo" alt="Logo">
            </div>
          </div>
          <div class="d-flex justify-content-center form_container">
            <form name="registrationform" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtusername" class="form-control input_user" value="<?=$_SESSION['username']?>" placeholder="username" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg></span>
                </div>
                <input type="email" name="txtemail" class="form-control input_user" value="<?=$_SESSION['email']?>" placeholder="Email" required>
              </div>
        

              <label for="rbtnstaff" class="radio"><input type="radio" name="txtdesignstion" id="rbtnstaff" value="staff" checked>Staff
              </label>
              <div class="input-group mb-2">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="txtpass" class="form-control input_pass" value="" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
        
              <div class="input-group mb-2">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="txtrepass" class="form-control input_pass" value="" placeholder="Re-enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
    
              <div class="d-flex justify-content-center mt-3 login_container">
                <a type="button" name="button" href="profile.php" id="btnregister" class="btn cancel_btn">cancel</a>
                <button type="submit" name="button" id="btnregister" class="btn login_btn">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <script src="vendors/fontawesome/all.min.js"></script>
</body>
</html>