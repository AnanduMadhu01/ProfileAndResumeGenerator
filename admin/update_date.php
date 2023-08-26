<?php
$id= $_GET['id'];
?>
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
	<title>update date</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  	<link href="assets/css/loginform.css" rel="stylesheet" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="../assets/css/loginform.css" rel="stylesheet">
</head>
<body>
<?php
if (isset($_POST['update'])) {
	$date= $_POST["date"];
  	$sql="UPDATE `staff_details` SET `REVELING_DATE`='$date' WHERE `STAFF_ID`='$id'"; 
      if(setData($sql)==true)
      {
        ?>
			<script>
				swal({
				title: "Updated Successfully!",
				text: "redirect to admin panel!",
				icon: "success",
				button: "OK"
			});
			window.onclick = myFunction;
			function myFunction() {
				window.location.href = "profile.php";
				}
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
			<img src="../assets/img/gallery/Pr.png" class="brand_logo" alt="Logo">
			</div>
		</div>
		<div class="d-flex justify-content-center form_container">
			<form method="POST" action="" name="loginform">
			<div class="input-group mb-3">
				<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="date" name="date" class="form-control input_user" required>
			</div>
	
			<div class="d-flex justify-content-center mt-3 login_container">
				<a type="button" href="profile.php" name="button" class="btn cancel_btn">cancel</a>
				<button type="submit" name="update" class="btn login_btn">Update</button>
			</div>
			
		</form>
		</div>
	</div>
  </div>
  
  <script src="../vendors/fontawesome/all.min.js"></script>
</body>
</html>
