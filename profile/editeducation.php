<?php
if($_SESSION['login']!="staff"){
  header("location: ../loginform.php");
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
  <link rel="stylesheet" href="assets/css/education.css">
</head>

<body>
  <div class="container mt-5">
    <h3 class="text-center mb-3">Edit Your Education Detailes</h3>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="bg-dark text-white">
            <th scope="col"><b>EDUCATION</b></th>
            <th scope="col">INSTITUTE NAME</th>
            <th scope="col">START DATE</th>
            <th scope="col">END DATE</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
          </tr>
        </thead>
        <tbody>
            
    <?php
        $sql6="SELECT * FROM `educationdetails` WHERE `EMAIL`='$email'";
        $result6 = getData($sql6);
        if ($result6->num_rows > 0) 
        {
            while($row6 = $result6->fetch_assoc()) {
    ?> 
          <tr>
            <th scope="row"> <?php echo $row6['EDUCATION']; ?></th>
            <td> <?php echo $row6['INSTITUTE_NAME']; ?></td>
            <td> <?php echo $row6['START_DATE']; ?></td>
            <td> <?php echo $row6['END_DATE']; ?></td>
            <td><a href="edu_edit_page.php?id=<?php echo $row6['ID'];?>">Edit</a> </td>
            <td><a href="delete_education_details.php?id=<?php echo $row6['ID'];?>">Delete</a> </td>
          </tr>
          <?php
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