<?php
if($_SESSION['login']!="staff"){
  header("location: ../loginform.php");
}
?>
<?php
include_once "../dbactions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your profile</title>
    <!-- Latest compiled and minified CSS -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="assets/css/editprofile.css">
</head>
<body>
<script>
    function validateSize(input) {
        const fileSize = input.files[0].size / 1024 / 1024; // in MiB
        if (fileSize > 2) {
          alert('File size exceeds 2 MiB');
          // $(file).val(''); //for clearing with Jquery
        } else {
          // Proceed further
        }
      }
</script>
<?php

$email=$_SESSION['email'];
$picture=$gender=$gender_male=$gender_female=$age=$about=$designation=$fblink=$instalink=$twitterlink=$linkedinlink="";
$jobtype=$pno=$empno=$phone=$doj=$dor=$new_img_name=$job_selected_regular=$job_selected_adhoc="";
$deserror=$pno_error="";
if($row['JOB_TYPE']=="regular"){
    ?>
    <style>
        .pnumber{
            visibility: visible;
        }
    </style>
    <?php
} else {
    ?>
    <style>
        .empnumber{
            visibility: visible;
        }
    </style>
    <?php
}
if($row['JOB_TYPE']=="regular"){
    $job_selected_regular="selected";
} else {
    $job_selected_adhoc="selected";
}
if($row['GENDER']=="male"){
    $gender_male="checked";
} else {
    $gender_female="checked";
}
if (isset($_POST['btnupdate'])) {
    $name=$_POST["name"];
    $picture=$_FILES["image"]["name"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];
    if($gender=="male"){
        $gender_male="checked";
    } else {
        $gender_female="checked";
    }
    $age=$_POST["age"];
    $about=$_POST["about"];
    $designation=$_POST["designation"];
    $fblink=$_POST["fblink"];
    $instalink=$_POST["instalink"];
    $twitterlink=$_POST["twitterlink"];
    $linkedinlink=$_POST["linkedinlink"];
    $jobtype=$_POST["jobtype"];
    $pno=$_POST["pno"];
    $empno=$_POST["empno"];
    if($jobtype=="regular"){
        $empno=0;
        ?>
        <style>
            .pnumber{
                visibility: visible;
            }
        </style>
        <?php
    }else if($jobtype=="adhoc"){
        $pno=0;
        ?>
        <style>
            .pnumber{
                visibility: visible;
            }
        </style>
        <?php
    }
    $phone=$_POST["phone"];
    $doj=$_POST["doj"];
    $dor=$_POST["dor"];

    $sql="UPDATE `logindetails` SET `USERNAME`='$name' where `EMAIL`='$email'";
    setData($sql);
    $sql1="UPDATE `staff_details` SET `DOB`='$dob',`GENDER`='$gender',`AGE`='$age',`ABOUT`='$about',`DESIGNATION`='$designation',`FB_LINK`='$fblink',`INSTA_LINK`='$instalink',`TWITTER_LINK`='$twitterlink',`LINKEDIN_LINK`='$linkedinlink',`JOB_TYPE`='$jobtype',`PEN_NUM`='$pno',`EMP_NO`='$empno',`PHONE`='$phone',`JOINING_DATE`='$doj',`REVELING_DATE`='$dor' WHERE `EMAIL`='$email'";
   
    if(setData($sql1)== true){
        if($picture != "")
        {
            $temp=explode(".",$_FILES["image"]["name"]);
            $extenction=end($temp);
            $img_name = $_FILES['image']['name'];
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                move_uploaded_file($_FILES["image"]["tmp_name"], "assets/img/profile_pictures/".$new_img_name);
                $sql2="UPDATE `staff_details` SET `PROFILE_IMAGE`='$new_img_name' WHERE `EMAIL`='$email'";
                if(setData($sql2)== true){
                    ?>
                    <script>
                            swal({
                            title: "Datas updated Successfully!",
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
            } else {
                ?>
            <script>
                    swal({
                    title: "Unsupported format for profile picture!",
                    text: "Allowed formats are '.jpg','.jpeg','.png'.",
                    icon: "warning",
                    button: "OK"
                });
                window.onclick = myFunction;
                function myFunction() {
                //    window.location.href = "profile.php";
                    }
            </script>
                <?php
            }
        } else{
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

        <div class="box">
            <div class="header">
                <p>Update your profile details</p>
            </div>

            <form name="editform" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-4 bold">
                        <p class="bold">Name</p>
                    </div>
                    <div class="col-8">
                        <input type="text" pattern="[A-Za-z]" title="Only alphabet allowed" name="name" placeholder="Full name" value="<?php echo $_SESSION['name']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p>Profile picture</p>
                    </div>
                    <div class="col-8">
                        <input  onchange="validateSize(this)" type="file" name="image">
                        <small class="ml-8"><span class="black">Size must be < 2 MB(allowed format "jpg", "jpeg", "png")</span></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Date of Birth</p>
                    </div>
                    <div class="col-3">
                        <input  style="background-color:#f2f2f2" type="date" value="<?php echo $row['DOB'];?>" name="dob">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p>Gender</p>
                    </div>
                    <div class="col-6">
                        <input type="radio" name="gender" value="male" checked>Male
                        <input type="radio" name="gender" value="female" <?php echo $gender_female; ?>>Female
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Age</p>
                    </div>
                    <div class="col-3">
                        <input type="number" value="<?php echo $row['AGE'];?>" name="age" id="age">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p>About</p>
                    </div>
                    <div class="col-8">
                        <textarea class="textarea" placeholder="Write about you" name="about"><?php echo $row['ABOUT'];?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p>Designation</p>
                    </div>
                    <div class="col-8">
                        <input type="text" name="designation" value="<?php echo $row['DESIGNATION'];?>">
                        <small class="ml-8"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Facebook Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" name="fblink" value="<?php echo $row['FB_LINK'];?>" placeholder="Eg:https://www.facebook.com/profile.php?id=***********">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Instagram Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" name="instalink" value="<?php echo $row['INSTA_LINK'];?>" placeholder="Eg:https://instagram.com/username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Twitter Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" name="twitterlink" value="<?php echo $row['TWITTER_LINK'];?>" placeholder="Eg:https://twitter.com/******">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Linkedin Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" name="linkedinlink" value="<?php echo $row['LINKEDIN_LINK'];?>" placeholder="https://www.linkedin.com/in/*******">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Job Type</p>
                    </div>
                    <div class="col-8">
                    <select class="form-select" name="jobtype" class="row" id="type">
                        <option value="" disabled selected>---Select--- </option>
                        <option value="regular" <?php echo  $job_selected_regular;?>>Regular</option>
                        <option value="adhoc" <?php echo  $job_selected_adhoc;?>>AD-HOC</option>
                    </select>
                    </div>
                </div>
                <div class="pnumber">
                    <div class="row">
                        <div class="col-4">
                            <p>Pen number</p>
                        </div>
                        <div class="col-8">
                            <input type="number" value="<?php echo $row['PEN_NUM'];?>" name="pno" maxlength="20">
                            <small class="ml-8"><?php echo $pno_error; ?></small>
                        </div>
                    </div>
                </div>
                
                <div class="empnumber">
                    <div class="row">
                        <div class="col-4">
                            <p>Employee number</p>
                        </div>
                        <div class="col-8">
                            <input type="number" name="empno" value="<?php echo $row['EMP_NO'];?>" maxlength="20">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                    <p>Phone</p>
                    </div>
                    <div class="col-8">
                        <input type="tel" pattern="[0-9]{10}" value="<?php echo $row['PHONE'];?>" placeholder="+91" name="phone">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p>Date of Joining</p>
                    </div>
                    <div class="col-8">
                        <input type="date" value="<?php echo $row['JOINING_DATE'];?>" name="doj">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Date of Reveling</p>
                    </div>
                    <div class="col-8">
                        <input type="date"value="<?php echo $row['REVELING_DATE'];?>" name="dor">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p></p>
                    </div>
                    <div class="col-4">
                        <a class="btn" href="profile.php" id="btncancel">Cancel</a>
                    </div>
                    <div class="col-4">
                        <button class="btn" type="submit" name="btnupdate" data-bs-toggle="collapse" href="#collapsebox" onclick="validate()">Update</button>
                    </div>
                </div>
            </form>
            
</div>

<script src="assets/js/profileedit.js"></script>
</body>
</html>