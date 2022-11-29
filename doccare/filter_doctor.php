<?php
include 'conne.php'; 
$spec_id=$_GET['spec_id'];
$query="select * from doctor_registration where`spec_id`= '$spec_id' ";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.php">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title> Find Doctor </title>
</head>
    <body>
<table class="content-table">
      <thead>
        <tr>

          <th>Doctor Name</th>
          <th>Specialization</th>
          <th>Email ID</th>
          <th>Book</th>

        </tr>
      </thead>


            <tr>
      <tbody>
        <?php
             while($rows=mysqli_fetch_assoc($result))
            {
              ?>
        <td> <?php echo $rows['fname']; echo " "; echo $rows['lname']; ?></td>
         <td> <?php echo $rows['specialization']; ?> </td>
             <td> <?php echo $rows['email']; ?></td>
  <td><a href="#"> Book appointment </td> </a>
        </tr>
      </tbody>
      <?php

      }
    ?>
    </table>
    </body>
</html>