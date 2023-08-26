<?php
if($_SESSION['login']!="admin"){
  header("location: ../admin_login.php");
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Flight Status | Bootstrap 4</title>
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Oxygen:300&display=swap" rel="stylesheet">
  <!-- bootstrap 4 css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- custom css   -->
  <link rel="stylesheet" href="../profile/assets/css/education.css">
</head>

<body>
  <div class="container mt-5">
    <div class="table-responsive">
        <h3>Year:1</h3>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="bg-dark text-white">
            <th scope="col">Roll No</th>
            <th scope="col">Name of Student</th>
            <th scope="col">Admission Number</th>
            <th scope="col">KTU Id</th>
            <th scope="col">Resume</th>
          </tr>
        </thead>
        <tbody>
            
    <?php
        $sql6="SELECT * FROM `student_details` WHERE `CURRENT_YEAR`='1' ORDER BY `ROLL_NO` ASC";
        $result6 = getData($sql6);
        if ($result6->num_rows > 0) 
        {
            while($row6 = $result6->fetch_assoc()) {
                $email=$row6['EMAIL'];
                $sql7="SELECT * FROM `logindetails` where `EMAIL`='$email'";
                $result7 = getData($sql7);
                if ($result7->num_rows > 0) 
                {
                    while($row7 = $result7->fetch_assoc()) {
    ?> 
          <tr>
            <td> <?php echo $row6['ROLL_NO']; ?></td>
            <th> <?php echo $row7['USERNAME']; ?></th>
            <td> <?php echo $row6['ADMISSION_NO']; ?></td>
            <td><?php echo $row6['KTU_ID']; ?></td>
            <td><a href="resume/temp.php?mail=<?php echo $email?>&id=student">Download</a></td>
          </tr>
          <?php
                    }
                }
            }
        }
          ?>
        </tbody>
      </table>
    </div>
  </div>

    <div class="container mt-5">
        <div class="table-responsive">
            <h3>Year:2</h3>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Roll No</th>
                <th scope="col">Name of Student</th>
                <th scope="col">Admission Number</th>
                <th scope="col">KTU Id</th>
                <th scope="col">Resume</th>
            </tr>
            </thead>
            <tbody>
                
        <?php
            $sql6="SELECT * FROM `student_details` WHERE `CURRENT_YEAR`='2' ORDER BY `ROLL_NO` ASC";
            $result6 = getData($sql6);
            if ($result6->num_rows > 0) 
            {
                while($row6 = $result6->fetch_assoc()) {
                    $email=$row6['EMAIL'];
                    $sql7="SELECT * FROM `logindetails` where `EMAIL`='$email'";
                    $result7 = getData($sql7);
                    if ($result7->num_rows > 0) 
                    {
                        while($row7 = $result7->fetch_assoc()) {
        ?> 
            <tr>
                <td> <?php echo $row6['ROLL_NO']; ?></td>
                <th> <?php echo $row7['USERNAME']; ?></th>
                <td> <?php echo $row6['ADMISSION_NO']; ?></td>
                <td><?php echo $row6['KTU_ID']; ?></td>
                <td><a href="resume/temp.php?mail=<?php echo $email?>&id=student">Download</a></td>
            </tr>
            <?php
                        }
                    }
                }
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="container mt-5">
        <div class="table-responsive">
            <h3>Year:3</h3>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Roll No</th>
                <th scope="col">Name of Student</th>
                <th scope="col">Admission Number</th>
                <th scope="col">KTU Id</th>
                <th scope="col">Resume</th>
            </tr>
            </thead>
            <tbody>
                
        <?php
            $sql6="SELECT * FROM `student_details` WHERE `CURRENT_YEAR`='3' ORDER BY `ROLL_NO` ASC";
            $result6 = getData($sql6);
            if ($result6->num_rows > 0) 
            {
                while($row6 = $result6->fetch_assoc()) {
                    $email=$row6['EMAIL'];
                    $sql7="SELECT * FROM `logindetails` where `EMAIL`='$email'";
                    $result7 = getData($sql7);
                    if ($result7->num_rows > 0) 
                    {
                        while($row7 = $result7->fetch_assoc()) {
        ?> 
            <tr>
                <td> <?php echo $row6['ROLL_NO']; ?></td>
                <th> <?php echo $row7['USERNAME']; ?></th>
                <td> <?php echo $row6['ADMISSION_NO']; ?></td>
                <td><?php echo $row6['KTU_ID']; ?></td>
                <td><a href="resume/temp.php?mail=<?php echo $email?>&id=student">Download</a></td>
            </tr>
            <?php
                        }
                    }
                }
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="container mt-5">
        <div class="table-responsive">
            <h3>Year:4</h3>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Roll No</th>
                <th scope="col">Name of Student</th>
                <th scope="col">Admission Number</th>
                <th scope="col">KTU Id</th>
                <th scope="col">Resume</th>
            </tr>
            </thead>
            <tbody>
                
        <?php
            $sql6="SELECT * FROM `student_details` WHERE `CURRENT_YEAR`='4' ORDER BY `ROLL_NO` ASC";
            $result6 = getData($sql6);
            if ($result6->num_rows > 0) 
            {
                while($row6 = $result6->fetch_assoc()) {
                    $email=$row6['EMAIL'];
                    $sql7="SELECT * FROM `logindetails` where `EMAIL`='$email'";
                    $result7 = getData($sql7);
                    if ($result7->num_rows > 0) 
                    {
                        while($row7 = $result7->fetch_assoc()) {
        ?> 
            <tr>
                <td> <?php echo $row6['ROLL_NO']; ?></td>
                <th> <?php echo $row7['USERNAME']; ?></th>
                <td> <?php echo $row6['ADMISSION_NO']; ?></td>
                <td><?php echo $row6['KTU_ID']; ?></td>
                <td><a href="resume/temp.php?mail=<?php echo $email?>&id=student">Download</a></td>
            </tr>
            <?php
                        }
                    }
                }
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>

  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <!-- bootstrap 4 popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap 4 js -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <!-- custom js -->
  <!-- <script src="assets/js/education.js"></script> -->
</body>

</html>