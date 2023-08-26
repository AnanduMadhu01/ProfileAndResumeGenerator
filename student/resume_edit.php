<?php
if($_SESSION['login']!="student"){
  header("location: ../loginform.php");
}
?>
<?php
    include_once "../dbactions.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Update</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="assets/css/editprofile.css">
</head>
<body>
    


<?php
    $summery="";
    $address="";
    $hobbies="";
    $language_known="";
    $Programing_language="";
    $web="";
    $address_error="";
    $nationality_error="";
    $hobbies_error="";
    $language_error="";
    $programing_error="";
    $error=$emailErr="";


    
    if(isset($_POST['btnresume1']))
    {
        $name_on_resume=$_POST["name"];
        $remail=$_POST["email"];
        $address=$_POST["address"];
        $hobbies=$_POST["hobbies"];
        $language_known=$_POST["language_known"];
        $Programing_language=$_POST["Programing_language"];
        $web=$_POST["web"];

        if(!stristr($remail,"@") OR !stristr($remail,".")) {
            $emailErr = "Invalid email format";
          }
        else
        {
            $sql8="UPDATE `resumedetails` SET `NAME`='$name_on_resume',`EMAIL_IN_RESUME`='$remail',`ADDRESS`='$address',`HOBBIES`='$hobbies',`LANGUAGES_KNOWN`='$language_known',`PROGRAMING_LANGUAGES_KNOWN`='$Programing_language',`WEBSITE`='$web' WHERE `EMAIL`='$email'";
            if(setData($sql8)==true)
            {
                ?>
                    <script>
                            swal({
                            title: "Datas Updated Successfully!",
                            text: "You can view in your profile!",
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
     } 
    ?>
    <?php
        $sql5="SELECT * FROM `resumedetails` WHERE `EMAIL`='$email'";
        $result5 = getData($sql5);
            if ($result5->num_rows > 0) 
            {
            while($row5 = $result5->fetch_assoc()) {
    
    ?>
    <div class="box">
        <div class="header">
            <p>Update Resume(only applicable in your resume)</p>
        </div>

        <form method="POST">

        <div class="row">
                <div class="col-4">
                    <p>Name</p>
                </div>
                <div class="col-8">
                    <input type="text" name="name" value="<?php if ($row5['NAME']==""){ echo $name; } else { echo $row5['NAME'];}?>">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <p>Email(On resume)</p>
                </div>
                <div class="col-8">
                    <input type="email" name="email" value="<?php if ($row5['EMAIL_IN_RESUME']==""){ echo $email; } else { echo $row5['EMAIL_IN_RESUME'];}?>">
                    <small><?php echo $emailErr;?></small>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <p>Address</p>
                </div>
                <div class="col-8">
                    <textarea class="textarea" name="address" ><?php echo $row5['ADDRESS'];?></textarea>
                    <small><?php echo $address_error;?></small>
                </div>
            </div>
            

            <div class="row">
                <div class="col-4">
                    <p>Hobbies</p>
                </div>
                <div class="col-8">
                    <textarea class="textarea" placeholder="eg:Reading,&#10;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Photography..." name="hobbies" ><?php echo $row5['HOBBIES'];?></textarea>
                    <small><?php echo $hobbies_error;?></small>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <p>Languages Known</p>
                </div>
                <div class="col-8">
                    <textarea class="textarea" placeholder="eg:Spanish,&#10;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;French..." name="language_known"><?php echo $row5['LANGUAGES_KNOWN'];?></textarea>
                    <small><?php echo $language_error;?></small>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <p> Programming Languages Known</p>
                </div>
                <div class="col-8">
                    <textarea class="textarea" placeholder="eg:Java,&#10;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Python...." name="Programing_language" ><?php echo $row5['PROGRAMING_LANGUAGES_KNOWN'];?></textarea>
                    <small><?php echo $programing_error;?></small>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <p>Website</p>
                </div>
                <div class="col-8">
                    <input placeholder="https://www.website.com" type="url" pattern="https://.*" size="80" name="web" value="<?php echo $row5['WEBSITE'];?>">
                     <small><?php echo $error;?></small>
                </div>
            
            </div>

            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-4">
                    <a class="btn" href="profile.php" id="btncancel">Cancel</a>
                </div>
                <div class="col-4">
                    <button class="btn btn-danger" name="btnresume1" type="submit">Update</button>
                </div>
            </div>

        </form>

    </div>
        <?php
            }
        }
        ?>
</body>
</html>