<?php
session_start();
include_once "dbactions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PR Login</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<link href="assets/css/loginform.css" rel="stylesheet" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="assets/css/loginform.css" rel="stylesheet">
</head>
<body>
<?php
$_SESSION['email']='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email= $_POST["email"];
	$_SESSION['email']=$email;
	$password = $_POST["pass"];
	$designation = $_POST["designation"];
  	$sql="SELECT * FROM `logindetails` WHERE `EMAIL`='$email' && `PASSWORD`='$password' && `REGISTER_AS`='$designation'";
  	$result = getData($sql);
	if ($result->num_rows > 0) 
	{
		if($designation=="staff"){
			$_SESSION['login']="staff";
			while($row = $result->fetch_assoc()) {
				?>
				<script>
					swal({
					title: "Login Successfull!",
					text: "Welcome <?php echo $row['USERNAME'];?>!",
					icon: "success",
					button: "OK"
				});
				window.onclick = myFunction;
				function myFunction() {
					window.location.href = "profile/profile.php";
					}
				</script>
				<?php
			}
		}else if($designation=="student"){
			$_SESSION['login']="student";
			while($row = $result->fetch_assoc()) {
				?>
				<script>
					swal({
					title: "Login Successfull!",
					text: "Welcome <?php echo $row['USERNAME'];?>!",
					icon: "success",
					button: "OK"
				});
				window.onclick = myFunction;
				function myFunction() {
					window.location.href = "student/profile.php";
					}
				</script>
				<?php
			}
		}
	}
	else{
		?>
			<script>
				swal({
				title: "Login Failed!",
				text: "Incorrect Username or Password!",
				icon: "warning",
				button: "OK"
			});
			</script>
			<?php
	}
}
?>
	<div id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-content">
		<div class="user_card">
		<div class="d-flex justify-content-center">
			<div class="brand_logo_container">
			<img src="assets/img/gallery/Pr.png" class="brand_logo" alt="Logo">
			</div>
		</div>
		<div class="d-flex justify-content-center form_container">
			<form method="POST" action="" name="loginform">
			<div class="input-group mb-3">
				<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="email" name="email" class="form-control input_user" value="<?=$_SESSION['email']?>" placeholder="Email" required>
			</div>
			<div class="input-group mb-2">
				<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-key"></i></span>
				</div>
				<input type="password" name="pass" class="form-control input_pass" value="" placeholder="password" minlength="8" required>
			</div>
	
			<label for="rbtnstaff" class="radio"><input type="radio" checked="checked" name="designation" id="rbtnstaff1" value="staff">Staff
				<span class="checkmark"></span>
			</label>
			<label for="rbtnstudent" class="radio"><input type="radio" name="designation" id="rbtnstudent1" value="student">Student
				<span class="checkmark"></span>
			</label>
	
			<div class="d-flex justify-content-center mt-3 login_container">
				<a type="button" href="index.php" name="button" class="btn cancel_btn">cancel</a>
				<button type="submit" name="button" class="btn login_btn">Login</button>
			</div>
			
		</form>
		</div>
	
		<div class="mt-4">
		<div class="d-flex justify-content-center links">
			Don't have an account? <a href="registrationform.php" class="ml-2">Sign Up</a>
		</div>
		<div class="d-flex justify-content-center links">
			<a href="">Contact Administrative if you forget your password.</a>
		</div>
		</div>
	</div>
  </div>
  
  <script src="vendors/fontawesome/all.min.js"></script>
</body>
</html>
