<?php
    session_start();
    include_once "../dbactions.php";
    $email=$_SESSION['emailaddress'];;
    $designation=$_SESSION['designation'];
    $sql="SELECT * FROM `logindetails` WHERE `EMAIL`='$email' && `REGISTER_AS`='$designation'";
    $result = getData($sql);
	if ($result->num_rows > 0) 
	{
        if($designation=="staff"){
            $_SESSION['login']="admin";
            $sql1="INSERT INTO `staff_details`(`EMAIL`, `PROFILE_IMAGE`, `GENDER`, `AGE`, `ABOUT`, `DESIGNATION`, `FB_LINK`, `INSTA_LINK`, `TWITTER_LINK`, `LINKEDIN_LINK`, `JOB_TYPE`, `PEN_NUM`, `EMP_NO`, `PSC`, `APPOINTMENT_LETTER`, `PHONE`, `JOINING_DATE`, `REVELING_DATE`) VALUES ('$email','profile-img.jpg','','','','','','','','','','','','','','','','')";
            $sql2="INSERT INTO `qualification_details`(`EMAIL`, `DIPLOMA`, `BTECH`, `MTECH`, `PHD`) VALUES ('$email','','','','')";
            $sql3="INSERT INTO `resumedetails`(`EMAIL`, `NAME`, `EMAIL_IN_RESUME`, `ADDRESS`, `PHONE`, `NATIONALITY`, `HOBBIES`, `LANGUAGES_KNOWN`, `PROGRAMING_LANGUAGES_KNOWN`, `WEBSITE`) VALUES('$email','','','','','','','','','')";
            if(setData($sql1)==true && setData($sql2)==true && setData($sql3)==true){
                header('Location: ../admin/profile.php');
            }
        } else if($designation=="student"){
            $sql1="INSERT INTO `student_details`(`EMAIL`, `PROFILE_IMAGE`, `DOB`, `GENDER`, `AGE`, `ABOUT`, `BLOOD_GROUP`, `ADMISSION_NO`,`ROLL_NO`, `KTU_ID`, `CURRENT_YEAR`, `PHONE`, `NATIONALITY`, `FB_LINK`, `INSTA_LINK`, `TWITTER_LINK`, `LINKED_IN`) VALUES ('$email','profile-img.jpg','','','','','','','','','','','','','','','')";
            $sql2="INSERT INTO `resumedetails`(`EMAIL`, `NAME`, `EMAIL_IN_RESUME`, `ADDRESS`, `PHONE`, `NATIONALITY`, `HOBBIES`, `LANGUAGES_KNOWN`, `PROGRAMING_LANGUAGES_KNOWN`, `WEBSITE`) VALUES('$email','','','','','','','','','')";
            if(setData($sql1)==true && setData($sql2)==true){
                header('Location: ../loginform.php');
            }
        }
    }
?>