<?php
session_start();
 include 'conne.php'; 
if(isset($_GET['token'])){

  $token = $_GET['token'];
  $updatequery = "update `doctor-registration` set registration_status ='1' where token ='$token'";
  $query = mysqli_query($conn,$updatequery);


  if ($query>0 ) {
  
    // echo '<script>alert("Email Verified. Account Activated successfully")</script>';
     $_SESSION['msg']= "Email Verified. Account Activated successfully";
    header('location:doctor-index.php'); 
    //$_SESSION["fname"] = $FirstName;
  
  }
  else {
     $_SESSION['msg'] = "Account Not Updated";
    header('location:doctor-registration.php');
  }


}



 ?>
