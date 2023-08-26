<?php
if($_SESSION['login'] != "student"){
    header("location: ../loginform.php");
  }
    include_once "../dbactions.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="../profile/assets/css/editprofile.css">
<script>
    function validateSize(input) {
        const fileSize = input.files[0].size / 1024 / 1024; // in MB
        if (fileSize > 2) {
          alert('File size exceeds 2 MB');
          // $(file).val(''); //for clearing with Jquery
        } else {
          // Proceed further
        }
    }
</script>
</head>
<body>
    


<?php
    $names="";
    $year="";
    $address="";
    $phone="";
    $picture="";
    $rollno="";
    $nationality="";
    $address_error="";
    $nationality_error="";
    $hobbies_error="";
    $language_error="";
    $programing_error="";
    $error="";
    $gender_male=$gender_female=$first=$second=$third=$forth="";
    if($row1['GENDER']=="male"){
        $gender_male="checked";
    } elseif($row1['GENDER']=="female") {
        $gender_female="checked";
    }

    if($row1['CURRENT_YEAR']=='1'){
        $first="selected";
    } elseif($row1['CURRENT_YEAR']=='2') {
        $second="selected";
    }elseif($row1['CURRENT_YEAR']=='3') {
        $third="selected";
    }elseif($row1['CURRENT_YEAR']=='4') {
        $forth="selected";
    }
    
    if(isset($_POST['btnupdate1']))
    {
        $names=$_POST["name"];
        $picture=$_FILES["image"]["name"];
        if(isset($_FILES['image'])){
            echo $_FILES['image']['name'];
        }
        $dob=$_POST['dob'];
        $about=$_POST["about"];
        $gender=$_POST["gender"];
        $age=$_POST["age"];
        $bgroup=$_POST["bgroup"];
        $admission=$_POST["admission"];
        $rollno=$_POST["rollno"];
        $ktuid=$_POST["ktuid"];
        $year=$_POST["cyear"];
        $phone=$_POST["phone"];
        $nationality=$_POST["nationality"];
        $fblink=$_POST["fblink"];
        $instalink=$_POST["instalink"];
        $twitterlink=$_POST["twitterlink"];
        $linkedinlink=$_POST["linkedinlink"];
        $sql3="UPDATE `logindetails` SET `USERNAME`='$names' where `EMAIL`='$email'";
        setData($sql3);
        $sql2="UPDATE `student_details` SET `DOB`='$dob',`GENDER`='$gender',`AGE`='$age',`ABOUT`='$about',`BLOOD_GROUP`='$bgroup',`ADMISSION_NO`='$admission',`ROLL_NO`='$rollno',`KTU_ID`='$ktuid',`CURRENT_YEAR`='$year',`PHONE`='$phone',`NATIONALITY`='$nationality',`FB_LINK`='$fblink',`INSTA_LINK`='$instalink',`TWITTER_LINK`='$twitterlink',`LINKED_IN`='$linkedinlink' WHERE `EMAIL`='$email'";
    
        if(setData($sql2)==true)
        {
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
                    move_uploaded_file($_FILES["image"]["tmp_name"], "img/profile_images/".$new_img_name);
                    $sql2="UPDATE `student_details` SET `PROFILE_IMAGE`='$new_img_name' WHERE `EMAIL`='$email'";
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
                       window.location.href = "profile.php";
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
            <p>Update Profile Details</p>
        </div>

        <form method="POST" enctype="multipart/form-data">

        <div class="row">
                <div class="col-4">
                    <p>Name</p>
                </div>
                <div class="col-8">
                    <input type="text" name="name" value="<?php echo $_SESSION['name'];?>">
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
                    <div class="col-4">
                        <input style="background-color:#f2f2f2" type="date" value="<?php echo $row1['DOB'];?>" name="dob">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>About</p>
                    </div>
                    <div class="col-8">
                        <textarea class="textarea" placeholder="Write about you" name="about"><?php echo $row1['ABOUT'];?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Gender</p>
                    </div>
                    <div class="col-4">
                        <input type="radio" name="gender" value="male" <?php echo $gender_male;?>>Male
                        <input type="radio" name="gender" value="female" <?php echo $gender_female;?>>Female
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Age</p>
                    </div>
                    <div class="col-3">
                        <input type="number" value="<?php echo $row1['AGE'];?>" name="age" id="ag">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Blood Group</p>
                    </div>
                    <div class="col-3">
                        <input type="text" value="<?php echo $row1['BLOOD_GROUP'];?>" name="bgroup" id="bldgroup">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Admission Number</p>
                    </div>
                    <div class="col-5">
                        <input type="number" value="<?php echo $row1['ADMISSION_NO'];?>" name="admission" id="adm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Roll Number</p>
                    </div>
                    <div class="col-5">
                        <input type="number" value="<?php echo $row1['ROLL_NO'];?>" name="rollno" id="adm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Ktu Id</p>
                    </div>
                    <div class="col-5">
                        <input type="text" value="<?php echo $row1['KTU_ID'];?>" name="ktuid" id="kid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Current Year</p>
                    </div>
                    <div class="col-8">
                    <select class="form-select" name="cyear" class="row" id="">
                        <option value="1" <?php echo $first;?>>First Year</option>
                        <option value="2" <?php echo $second;?>>Second Year</option>
                        <option value="3" <?php echo $third;?>>Third Year</option>
                        <option value="4" <?php echo $forth;?>>Fourth Year</option>
                    </select>
                    </div>
                </div>
            <div class="row">
                <div class="col-4">
                    <p>Nationality</p>
                </div>
                <div class="col-5">
                    <input type="text" name="nationality" value="<?php echo $row1['NATIONALITY'];?>">
                    <small><?php echo $nationality_error;?></small>
                     
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>Phone</p>
                </div>
                <div class="col-5">
                    <input type="tel" pattern="[0-9]{10}" name="phone"  value="<?php echo $row1['PHONE'];?>">
                </div>
            </div>
            <div class="row">
                    <div class="col-4">
                        <p>Facebook Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" name="fblink" value="<?php echo $row1['FB_LINK'];?>" placeholder="Eg:https://www.facebook.com/profile.php?id=***********">
                    </div>
            </div>
            <div class="row">
                    <div class="col-4">
                        <p>Instagram Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" type="text" name="instalink" value="<?php echo $row1['INSTA_LINK'];?>" placeholder="Eg:instagram.com/username">
                    </div>
            </div>
            <div class="row">
                    <div class="col-4">
                        <p>Twitter Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80"  name="twitterlink" value="<?php echo $row1['TWITTER_LINK'];?>" placeholder="Eg:https://twitter.com/******">
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-4">
                        <p>Linkedin Profile Link</p>
                    </div>
                    <div class="col-8">
                        <input type="url" pattern="https://.*" size="80" name="linkedinlink" value="<?php echo $row1['LINKED_IN'];?>" placeholder="https://www.linkedin.com/in/*******">
                    </div>
                </div>
       
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <a href="profile.php" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-4">
                    <button name="btnupdate1" class="btn btn-danger" type="submit">Update</button>
                </div>
            </div>

        </form>

    </div>

</body>
</html>