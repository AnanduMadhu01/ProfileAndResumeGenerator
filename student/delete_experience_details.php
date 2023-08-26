<?php
session_start();
if($_SESSION['login']!="student"){
  header("location: ../loginform.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php
include_once "../dbactions.php";
$id= $_GET["id"];
$sql="DELETE FROM `experiencedetails` WHERE `ID`='$id'";
if(setData($sql)==true)
           {
            ?>
            <script>
                    swal({
                    title: "Data Deleted Successfully!",
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
            } else{
                echo "error";
            }
?>
    
</body>
</html>



