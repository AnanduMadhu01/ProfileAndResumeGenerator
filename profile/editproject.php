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
    <h3 class="text-center mb-3">Edit Your Project Detailes</h3>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="bg-dark text-white">
          <th scope="col">PROJECT NAME</th>
            <th scope="col">YEAR</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
          </tr>
        </thead>
        <tbody>
            
    <?php
        $sql16="SELECT * FROM `projectdetails` WHERE `EMAIL`='$email'";
        $result16 = getData($sql16);
        if ($result16->num_rows > 0) 
        {
            while($row16 = $result16->fetch_assoc()) {
    ?> 
          <tr>
            <th scope="row"> <?php echo $row16['PROJECT_NAME']; ?></th>
            <td> <?php echo $row16['YEAR']; ?></td>
            <td> <?php echo $row16['DESCRIPTION'];?></td>
            <td><a href="project_edit_page.php?id=<?php echo $row16['ID'];?>">Edit</a> </td>
            <td><a href="delete_project_details.php?id=<?php echo $row16['ID'];?>">Delete</a> </td>
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