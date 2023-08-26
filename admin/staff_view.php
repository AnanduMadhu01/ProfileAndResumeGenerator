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
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="bg-dark text-white">
            <th scope="col"><b>Name of Faculty</b></th>
            <th scope="col">Designation</th>
            <th scope="col">Regular/Ad-Hoc</th>
            <th scope="col">Qualification</th>
            <th scope="col">Date of Joining</th>
            <th scope="col">Date of Releiving</th>
            <th scope="col">Resume</th>
          </tr>
        </thead>
        <tbody>
            
    <?php
        $sql6="SELECT * FROM `staff_details`";
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
            <th scope="row"> <?php echo $row7['USERNAME']; ?></th>
            <td> <?php echo $row6['DESIGNATION']; ?></td>
            <td> <?php echo $row6['JOB_TYPE']; ?></td>
            <td> <?php 
            $sql8="SELECT * FROM `qualification_details` where `EMAIL`='$email'";
            $result8 = getData($sql8);
            if ($result8->num_rows > 0) 
            {
                while($row8 = $result8->fetch_assoc()) {
                  if($row8['PHD']=="" && $row8['MTECH']=="" && $row8['BTECH']=="" && $row8['DIPLOMA']==""){
                    echo "";
                  }else if(isset($row8['PHD'])!="") {
                        echo "PHD";
                    }else if(isset($row8['MTECH'])!="") {
                        echo "MTECH";
                    }else if(isset($row8['BTECH'])!="") {
                        echo "BTECH";
                    }else if(isset($row8['DIPLOMA'])!="") {
                        echo "DIPLOMA";
                    }else{
                      echo "";
                    }
                }
            }
            ?></td>
            <td><?php echo $row6['JOINING_DATE']; ?></td>
            <td><?php
            if($row6['REVELING_DATE']==""){
              $id=$row6['STAFF_ID'];
              ?>
              <a href="update_date.php?id=<?php echo $id;?>">update a date</a>
              <?php
            }else {
             echo $row6['REVELING_DATE']; 
            }
             ?></td>
            <td><a href="resume/temp.php?mail=<?php echo $email?>&id=staff">Download</a></td>
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