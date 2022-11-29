<?php 
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
     include 'conne.php';
     
     if(!isset($_SESSION['manager_id']) ){
        header('location:manger-login.php');


    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="vendors/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Doctor</title>
</head>

<body>
<?php 
    include'include/header.php'


  ?>
    <div class=" container mt-5">
    <h1 class="h3 mt-5 d-flex justify-content-center text-gray-800">Book New Appointment</h1>
    <h4 class=" d-flex justify-content-center text-muted">Enter Patients Details</h4>
    <?php

include 'conne.php';


if(isset($_POST['create'])){
    $FirstName = $_POST['fname'];
    $LastName  = $_POST['lname'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
    $Token =bin2hex(random_bytes(15));

    $check =" select * from `useraccount` where email ='$Email' and `role`='patient'";
    
    
   
    $result=mysqli_query($conn,$check); 
    $count = mysqli_num_rows($result);
    
    if($count>0){
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-key'></i>
       Patient Already register with same email id. Please book from existing patients List.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }else{

        $insertquery ="INSERT INTO `useraccount` ( `firstname`, `lastname`,`email`, `phone`,`registration_status`,`role`,`profilepic`,`token`)  VALUES ( '$FirstName', '$LastName' , '$Email','$Phone','0','patient','images/patient/patient.png','$Token')";
       
        $result2 = mysqli_query($conn,$insertquery);
    
    if($result2>0){
        $mail = new PHPMailer(true);

        try {
                              // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
        //$mail->SMTPDebug = 2; //to see all types of error in SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'doccare11@gmail.com';                     // SMTP username
            $mail->Password   = 'ManLakAnk';                               // SMTP password
  
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
            //Recipients
            $mail->setFrom('doccare11@gmail.com', 'Doc Care');
            $mail->addAddress($Email);    // Add a recipient
  
            $mail->addReplyTo('no-reply@gmail.com', 'no reply');
  
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Email Activation';
             $mail->Body    = "Hi, $FirstName.Click here  http://localhost/doccare/patient-activate.php?token=$Token to setup password and ";

            
            
            
           
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
            $mail->send();
   
           
    $_SESSION['msg'] = " Account Created. Email send to the user successfully.";
    $_SESSION['user_id']=$Token;
    // setcookie('user_id',$row['doc_id'],time()+60*60*24*30);
          header('location:doctor-list.php');
       
        }
         catch (Exception $e) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'>
            Message could not be sent. Mailer Error: {$mail->ErrorInfo}
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
            
        
        }




        //  header('location:doctor-index.php');

    
    }
    }

}
   ?>
   
   <?php
    
  
    if(isset($_SESSION['msg'])){
      
      $error= $_SESSION['msg']; 
      echo "
      <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'>
      $error
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
     
          

         }
         unset($_SESSION['msg']); 
  ?>








        <div class="  row justify-content-center  mt-5">
            <div class="col-md-5 form-border border rounded-3 p-3 border-primary shadow border-3">
                
            <a href="doctor-appointment.php">
                <i class="fas fa-arrow-left d-flex justify-content-start "></i></a>
                <form action="" method="post">

                    <div class="form-group">
                        <label>First Name</label>
                        <div class="input-group">
                            
                            <input type="text" name="fname" id="fname"
                                class="form-control" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <div class="input-group">
                            
                            <input type="text" name="lname" id="lname"
                                class="form-control"  autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="input-group">
                           
                            <input type="text" name="phone" id="phone"
                                class="form-control " autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                        <input type="email" name="email" id="email" class="form-control " autocomplete="off" />
                           
                        </div>
                    </div>
                   
                    <input type="submit" name="create" value="Save" class="btn btn-primary col-lg-12 mt-2">

        </form>
            </div>

        </div>

        
    </div>

 
</body>

</html>