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
    <title>Upload Documents</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/editprofile.css">
    <style>
        p{
        font-weight: bolder;
        }
        small {
        color: red;
        }
    </style>
</head>
<body>
<?php
$email=$_SESSION['email'];
$psc_error=$btech_error=$mtech_error=$appletter_error=$diploma_error=$phd_error="";
$flag_psc=$flag_appltr=$flag_diploma=$flag_btech=$flag_mtech=$flag_phd=1;
$check1=$check2=$check3=$check4="";
$psc=$applicationletter=$diploma=$btech=$mtech=$phd="";
$psc_file=$applicationletter_file=$diploma_file=$btech_file=$mtech_file=$phd_file="";

if (isset($_POST['btnupload'])) {
    $psc_file=$_FILES['psc']['name'];
    $applicationletter_file=$_FILES['appletter']['name'];
    $diploma_file=$_FILES['diplomafile']['name'];
    $btech_file=$_FILES['btechfile']['name'];
    $mtech_file=$_FILES['mtechfile']['name'];
    $phd_file=$_FILES['phdfile']['name'];
    if ( $psc_file != "" ) {
        if ($_FILES['psc']['type'] == "application/pdf") {
            $source_file1 = $_FILES['psc']['tmp_name'];
            $dest_file1 = "assets/pdf/psc/".$_FILES['psc']['name'];
    
            if (file_exists($dest_file1)) {
                $psc_error="The file name already exists!!";
                $flag_psc=0;
            }
            else {
                
                if($_FILES['psc']['error'] == 0) {
                    $flag_psc=2;
                }
            }
        }
        else {
            $psc_error="Only PDF files are allowed!!";
            $flag_psc=0;
        }
    }
    if ($applicationletter_file !="") {
        if ($_FILES['appletter']['type'] == "application/pdf") {
            $source_file2 = $_FILES['appletter']['tmp_name'];
            $dest_file2 = "assets/pdf/appoinment_letter/".$_FILES['appletter']['name'];
    
            if (file_exists($dest_file2)) {
                $appletter_error="The file name already exists!!";
                $flag_appltr=0;
            }
            else {
                if($_FILES['appletter']['error'] == 0) {
                    $flag_appltr=2;
                }
            }
        }
        else {
            $appletter_error="Only PDF files are allowed!!";
            $flag_appltr=0;
        }
    }
    if(isset($_POST['diploma'])){
        foreach ($_POST['diploma'] as $name){ 
            $diploma= $name;
            $check1="checked";
        }
        if ($diploma_file !="" ) {
            if ($_FILES['diplomafile']['type'] == "application/pdf") {
                $source_file3 = $_FILES['diplomafile']['tmp_name'];
                $dest_file3 = "assets/pdf/qualifications/".$_FILES['diplomafile']['name'];
        
                if (file_exists($dest_file3)) {
                    $diploma_error="The file name already exists!!";
                    $flag_diploma=0;
                    echo "error";
                }
                else {
                    if($_FILES['diplomafile']['error'] == 0) {
                        $flag_diploma=2;
                    }
                }
            }
            else {
                $diploma_error="Only PDF files are allowed!!";
                $flag_diploma=0;
                echo "error";
            }
        }
    }

    if(isset($_POST['btech'])){
        foreach ($_POST['btech'] as $name){ 
            $btech= $name;
            $check2="checked";
        }
        if ( $btech_file !="" ) {
            if ($_FILES['btechfile']['type'] == "application/pdf") {
                $source_file4 = $_FILES['btechfile']['tmp_name'];
                $dest_file4 = "assets/pdf/qualifications/".$_FILES['btechfile']['name'];
        
                if (file_exists($dest_file4)) {
                    $btech_error="The file name already exists!!";
                    $flag_btech=0;
                }
                else {
                    if($_FILES['btechfile']['error'] == 0) {
                        $flag_btech=2;
                    }
                }
            }
            else {
                $btech_error="Only PDF files are allowed!!";
                $flag_btech=0;
            }
        }
    }
    if(isset($_POST['mtech'])){
        foreach ($_POST['mtech'] as $name){ 
            $mtech= $name;
            $check3="checked";
        }
        if ($mtech_file !="") {
            if ($_FILES['mtechfile']['type'] == "application/pdf") {
                $source_file5 = $_FILES['mtechfile']['tmp_name'];
                $dest_file5 = "assets/pdf/qualifications/".$_FILES['mtechfile']['name'];
        
                if (file_exists($dest_file5)) {
                    $mtech_error="The file name already exists!!";
                    $flag_mtech=0;
                }
                else {
                    if($_FILES['mtechfile']['error'] == 0) {
                        $flag_mtech=2;
                    }
                }
            }
            else {
                $mtech_error="Only PDF files are allowed!!";
                $flag_mtech=0;
            }
        }
    }
    if(isset($_POST['phd'])){
        foreach ($_POST['phd'] as $name){ 
            $phd= $name;
            $check4="checked";
        }
        if ($phd_file !="" ) {
            if ($_FILES['phdfile']['type'] == "application/pdf") {
                $source_file6 = $_FILES['phdfile']['tmp_name'];
                $dest_file6 = "assets/pdf/qualifications/".$_FILES['phdfile']['name'];
        
                if (file_exists($dest_file6)) {
                    $mtech_error="The file name already exists!!";
                    $flag_phd=0;
                }
                else {
                    if($_FILES['phdfile']['error'] == 0) {
                        $flag_phd=2;
                    }
                }
            }
            else {
                $phd_error="Only PDF files are allowed!!";
                $flag_phd=0;
            }
        }
    }

    if($flag_psc != 0 && $flag_appltr != 0 && $flag_diploma !=0 && $flag_btech !=0 && $flag_mtech !=0 && $flag_phd !=0){
        if($flag_psc==2){
            $qry1="UPDATE `staff_details` SET `PSC`='$psc_file' WHERE `EMAIL`='$email'";
            if(setData($qry1)== true){
                move_uploaded_file( $source_file1, $dest_file1 )
                or die ("Error!!");
            }
        }
        if($flag_appltr==2){
            $qry1="UPDATE `staff_details` SET `APPOINTMENT_LETTER`='$applicationletter_file' WHERE `EMAIL`='$email'";
            if(setData($qry1)== true){
                move_uploaded_file( $source_file2, $dest_file2 )
                or die ("Error!!");
            }
        }
        if($flag_diploma==2){
            $qry1="UPDATE `qualification_details` SET `DIPLOMA`='$diploma_file' WHERE `EMAIL`='$email'";
            if(setData($qry1)== true){
                move_uploaded_file( $source_file3, $dest_file3 )
                or die ("Error!!");
            }
        }
        if($flag_btech==2){
            $qry1="UPDATE `qualification_details` SET `BTECH`='$btech_file' WHERE `EMAIL`='$email'";
            if(setData($qry1)== true){
                move_uploaded_file( $source_file4, $dest_file4 )
                or die ("Error!!");
            }
        }
        if($flag_mtech==2){
            $qry1="UPDATE `qualification_details` SET `MTECH`='$mtech_file' WHERE `EMAIL`='$email'";
            if(setData($qry1)== true){
                move_uploaded_file( $source_file5, $dest_file5 )
                or die ("Error!!");
            }
        }
        if($flag_phd==2){
            $qry1="UPDATE `qualification_details` SET `PHD`='$phd_file' WHERE `EMAIL`='$email'";
            if(setData($qry1)== true){
                move_uploaded_file( $source_file6, $dest_file6 )
                or die ("Error!!");
            }
        }
        ?>
            <script>
                    swal({
                    title: "Files uploaded Successfully!",
                    text: "You can view it in ypur profile!",
                    icon: "success",
                    button: "OK"
                });
                window.onclick = myFunction;
                function myFunction() {
                    window.location.href = "profile.php";
                    }
            </script>
        <?php
    } else{
        ?>
                    <script>
                            swal({
                            title: "Something went wrong!",
                            text: "Please Try again",
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
}
?>
        <div class="box">
            <div class="header">
                <p>Upload your documents(.pdf files)</p>
            </div>

            <form name="editform" method="POST" enctype="multipart/form-data">

            <?php
                $sql="SELECT `JOB_TYPE` FROM `staff_details` WHERE `EMAIL`='$email'";
                $result = getData($sql);
                if ($result->num_rows > 0) 
                {
                    while($row1 = $result->fetch_assoc()) {
                        if( $row1['JOB_TYPE'] =="regular"){
            ?>
                <div class="row">
                    <div class="col-4">
                        <p>PSC Details</p>
                    </div>
                    <div class="col-8">
                        <input type="file" name="psc">
                        <small class="ml-8"><?php echo $psc_error;?></small>
                    </div>
                </div>
                <?php
                    }
                }
                }
                ?>
                <div class="row">
                    <div class="col-4">
                        <p>Qualifications</p>
                    </div>
                    <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="diploma[]" value="diploma" id="diplomacheck" onclick="toggleBoxVisibility()" <?php echo $check1;?>>
                        <label class="form-check-label" for="diplomacheck">Diploma</label><br>
                        <small><span><input class="file" id="deploma" type="file" name="diplomafile"></span></small>
                        <small class="ml-8"><?php echo $diploma_error;?></small>
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="btech[]" value="btech" id="btechcheck" onclick="toggleBoxVisibility()" <?php echo $check2;?>>
                        <label class="form-check-label" for="btechcheck">B-Tech</label><br>
                        <small><span><input class="file" type="file" id="btech" name="btechfile"></span></small>
                        <small class="ml-8"><?php echo $btech_error;?></small>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p></p>
                    </div>
                    <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mtech[]" value="mtech" id="mtechcheck" onclick="toggleBoxVisibility()" <?php echo $check3;?>>
                        <label class="form-check-label" for="mtechcheck">M-Tech</label>
                        <small><span><input class="file" type="file" id="mtech" name="mtechfile"></span></small>
                        <small class="ml-8"><?php echo $mtech_error;?></small>
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="phd[]" value="phd" id="phdcheck" onclick="toggleBoxVisibility()" <?php echo $check4;?>>
                        <label class="form-check-label" for="phdcheck">PHD</label>
                        <small><span><input class="file" type="file" id="phd" name="phdfile"></span></small>
                        <small class="ml-8"><?php echo $phd_error;?></small>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Appoignment Letter</p>
                    </div>
                    <div class="col-8">
                        <input type="file" name="appletter">
                        <small class="ml-8"><?php echo $appletter_error;?></small>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4">
                        <p></p>
                    </div>
                    <div class="col-4">
                        <a href="profile.php" class="btn" id="btncancel">Cancel</a>
                    </div>
                    <div class="col-4">
                        <button class="btn" type="submit" name="btnupload" onclick="validate()">Update</button>
                    </div>
                </div>
            </form>
            
</div>
<script src="assets/js/profileedit.js"></script>
</body>
</html>