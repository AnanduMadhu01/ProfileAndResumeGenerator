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
    <title>Event Registration Form</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    label{
        color:red;
    }
</style>
</head>
<body>
    <?php
    $error="";
    $education="";
    $institution="";
    $start="";
    $end="";
    
    if(isset($_POST['btnupedu'])){
        $education=$_POST["edu"];
        $institution=$_POST["insti"];
        $start=$_POST["da"];
        $end=$_POST["end"];
        $today=date('Y-m-d');
        if($education=="" || $institution=="" || $start=="" || $end==""){
            $error="Error";
        }
        else if($start>$today or $end>$today)
        {
            $error="invalid date";
        }
        else{
            $sql7="INSERT INTO `educationdetails`(`EMAIL`, `EDUCATION`, `INSTITUTE_NAME`, `START_DATE`, `END_DATE`) VALUES ('$email',' $education','$institution',' $start','$end')";
            if(setData($sql7)==true)
           {
            ?>
                    <script>
                            swal({
                            title: "Datas Inserted Successfully!",
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
     <script>
          function validateenddate(input) {
            var startdate= document.getElementById('sdate').value;
            var enddate = document.getElementById('edate').value;
            // var today = new Date();
            // var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var education= document.getElementById('education').value;
            var institute= document.getElementById('institute').value;
            if(education=="" || institute==""){
                alert("All Fields are required.");
            }
            if(startdate > enddate){
                alert("Starting date must be less than ending date");
            }
          }
        </script>
    <div class="box">
        <div class="header">
            <p>Education Details</p>
        </div>

        <form method="POST" action="">
            <div class="row">
                <div class="col-3">
                    <p>Education</p>
                </div>
                <div class="col-8">
                    <input name="edu" id="education" type="text" value="<?php echo $education;?>">
                </div>
            </div>


            <div class="row">
                <div class="col-3">
                    <p>Institute</p>
                </div>
                <div class="col-8">
                    <input name="insti" id="institute" type="text" value="<?php echo $institution;?>">
                </div>
            </div>


            <div class="row">
                <div class="col-3">
                    <p>Date</p>
                </div>
                <div class="col-4">
                    <input style="background-color:#f2f2f2" name="da" id="sdate" type="date" value="<?php echo $start;?>">
                    <small style="color:black">Start date</small>
                </div>
                <div class="col-4">
                    <input style="background-color:#f2f2f2" id="edate" name="end" type="date" class="ml-4" value="<?php echo $end;?>">
                    <small style="color:black" class="ml-4">End date</small>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p></p>
                </div>
                <div class="col-8">
                    <label><?php echo $error;?></label>
                </div>
            </div>

            
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-4">
                    <a type="button" href="profile.php" class="btn btn-danger">Cancel</a>
                </div>
                <div class="col-4">
                    <button name="btnupedu" type="submit" class="btn btn-danger">Insert</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>