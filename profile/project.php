
<?php
if($_SESSION['login']!="staff"){
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
    <title>ADD PROJECT</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">
<style>
    label{
        color:red;
    }
</style>
</head>
<body>
    <?php
    $project="";
    $description="";
    $year="";
    if(isset($_POST['btnpro'])){
        $project=$_POST["project"];
        $description=$_POST["dis"];
        $year=$_POST["year"];
            $sql15="INSERT INTO `projectdetails`(`EMAIL`, `PROJECT_NAME`, `YEAR`, `DESCRIPTION`) VALUES ('$email','$project','$year','$description')";
            if(setData($sql15)==true)
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
                          window.location.href = "profile.php #resume";
                            }
                        </script>
                    <?php
            }
        
    } 
        
    
    
    ?>
    <div class="box">
        <div class="header">
            <p>Project Details</p>
        </div>

        <form method="POST" action="">
            <div class="row">
                <div class="col-3">
                    <p>Project Name</p>
                </div>
                <div class="col-8">
                    <input name="project" type="text" value="<?php echo $project;?>" required           >
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p>Year</p>
                </div>
                <div class="col-4">
                    <input  style="background-color:#f2f2f2" name="year" type="month" value="<?php echo $year;?>" required>

                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p>Description</p>
                </div>
                <div class="col-8">
                    <textarea class="textarea" name="dis" required><?php echo $description;?></textarea>
                    <small></small>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-4">
                    <button class="btn btn-danger">Cancel</button>
                </div>
                <div class="col-4">
                    <button type="submit" name="btnpro" class="btn btn-danger">Insert</button>
                </div>
            </div>

        </form>

    </div>

</body>
</html>