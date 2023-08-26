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
    <title>Experience</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
<?php
    $error="";
    $dsn="";
    $company="";
    $city="";
    $start="";
    $end="";
    
    if(isset($_POST['buttonexp'])){
        $company=$_POST["companyname"];
        $dsn=$_POST["desn"];
        $city=$_POST["cityname"];
        $start=$_POST["start"];
        $end=$_POST["end"];
        $today=date('Y-m-d');
        
        if($company==""|| $city=="" || $start=="" || $end=="")
        {
            $error="Error";
        }
       elseif($start>$end) 
        {
            $error="Starting date must be less than ending date";
        }
        elseif($start>$today or $end>$today)
        {
            $error="invalid date";
        }
        else{
            $sql5="INSERT INTO `experiencedetails`(`EMAIL`,`COMPANY`,`DESIGNATION`, `CITY`, `START_DATE`, `END_DATE`) VALUES ('$email','$company','$dsn','$city',' $start','$end')";
        
            if(setData($sql5)==true)
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
          function validateform(input) {
            var cmpname= document.getElementById('cmpname').value;
            var city = document.getElementById('city').value;
            var dsn = document.getElementById('dsn').value;
            // var today = new Date();
            // var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var sdate= document.getElementById('stdate').value;
            var edate= document.getElementById('endate').value;
            if(cmpname=="" || city=="" || dsn==""){
                alert("All Fields are required.");
            }
            if(stdate > edate){
                alert("Starting date must be less than ending date");
            }
          }
        </script>
    <div class="box">
        <div class="header">
            <p>Experience Details</p>
        </div>

        <form method="POST">
            <div class="row">
                <div class="col-3">
                    <p>Company</p>
                </div>
                <div class="col-8">
                    <input  name="companyname" id="cmpname" type="text" value="<?php echo $company;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Designation</p>
                </div>
                <div class="col-8">
                    <input  name="desn" id="dsn" type="text" value="<?php echo $dsn;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>City</p>
                </div>
                <div class="col-8">
                    <input name="cityname" type="text" id="city" value="<?php echo $city;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Date</p>
                </div>
                <div class="col-4">
                    <input style="background-color:#f2f2f2" name="start" id="stdate" type="date" value="<?php echo $start;?>">
                    <small style="color:black">Start date</small>
                </div>
                <div class="col-4">
                    <input style="background-color:#f2f2f2" name="end" id="endate" type="date" value="<?php echo $end;?>" class="ml-4">
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
                    <button type="submit" name="buttonexp" class="btn btn-danger">Insert</button>
                </div>
            </div>

        </form>

    </div>

</body>
</html>