<?php

 include 'conne.php'; 
if(isset($_GET['token'])){

  $token = $_GET['token'];
  $updatequery = "update `admin` set registration_status ='1' where token ='$token'";
  $query = mysqli_query($conn,$updatequery);

// $check ="select * from `doctor-registration` where token ='$token' and registration_status ='1'"; 
// $result = mysqli_query($conn,$check);
// $num = mysqli_num_rows($result);



// if($num >0){
//   $_SESSION['msg'] = "Your email is already verified. Please login ";
  
//       header('location:doctor-login.php');
     

   
//   } 
  if ($query>0 ) {
  
    // echo '<script>alert("Email Verified. Account Activated successfully")</script>';
     $_SESSION['msg'] = "Email Verified. Account Activated successfully";
    header('location:admin-index.php'); 
    //$_SESSION["fname"] = $FirstName;
  
  }
  else {
     $_SESSION['msg'] = "Account Not Updated";
    header('location:admin-registration.php');
  }


}



 ?>
