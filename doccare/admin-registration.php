<?php 
 session_start();
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
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
    <title>Doc Care Accounts</title>
</head>

<body style="
    padding-left: 0px;">
    <?php 
    include'include/navbar.php'
     ?>
    <div class="top-bar mt-5 col-lg-12 d-flex text-dark justify-content-center">
        <div class="login-top-bar  text-lg">
            <a href="admin-login.php" class="link-secondary">
                Login
            </a>
        </div>

        <div class="login-top-bar ">
            <a href="admin-registration.php" class="link-secondary">
                Register
            </a>
        </div>

    </div>
    <hr class=" top-bar-hr col-lg-8 mx-auto ">
    <?php

include 'conne.php';
if(isset($_POST['save']))
{
    $FirstName = $_POST['fname'];
    $UserName = $_POST['lname'];
    $Email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_BCRYPT);

    // to generate a token for validation of email
    $token =bin2hex(random_bytes(15));
    $profilepic = $_FILES['profilepic'];
    
    $filename = $profilepic['name'];
    $filepath = $profilepic['tmp_name'];
    $fileerror = $profilepic['error'];
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //to avoid duplicate data entry
        $q =" select * from `useraccount` where email ='$Email'"; 
		$result = mysqli_query($conn,$q);
		$num = mysqli_num_rows($result);
       
		
		    // $email=$_SESSION["email"];
		if($num >0){
		echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
      email id already exist
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

		}
		else{
            $destfile ='admin/'.$filename;
    move_uploaded_file($filepath, $destfile);
            $query ="INSERT INTO `useraccount` ( `firstname`, `lastname`,`email`, `password`,`token`,`registration_status`,`profilepic`,`role`) VALUES ( '$FirstName', '$UserName' , '$Email','$hash','$token','0','images/patient/patient.png','admin')";
         $insquery=mysqli_query($conn,$query);
     if($insquery>0){

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
             $mail->Body    = "Hi, $FirstName.Click here  http://localhost/doccare/admin-activate.php?token=$token to activate your account";
            // $mail->Body    = file_get_contents("mail.php");
            
            
            
           
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
            $mail->send();
            // $_SESSION['msg']="check your mail to activate your account $email";
            echo"
            <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
           Please check your mail to activate your account .
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
            
            
            
            
            // header('location:stu-register.php');
        }
         catch (Exception $e) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'>
            Message could not be sent. Mailer Error: {$mail->ErrorInfo}
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
            
        
        }



         $_SESSION["fname"] = $FirstName;

        // $_SESSION['msg'] = "Registration succesful";
        //  header('location:doctor-index.php');

     }else{
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'>
        Something went wrong
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

     }
        
        }
}
}
?> 


    <div class="doc-reg col-lg-12">
        <!-- image will be hidden in small screen d-sm-none  -->
        <div class="doc-reg-image img-responsive col-lg-6 col-sm-12 d-none d-lg-block d-xl-block">
            <img src="images/health.jpg" alt="">


        </div>

        <div class="doc-reg-form col-lg-6 col-sm-12 ms-3 ">

            <form method="post" enctype="multipart/form-data">
                <div class="form-border border rounded-3 p-3 border-muted col-lg-9 shadow">
                    <div class="reg-head col-lg-12 text-primary text-center">
                        Admin Registration
                    </div>
               

                    <hr class="my-4">
                    <div class="form-group col-lg-12">
                        <label>First name</label>
                        <input type="text" class="form-control" name="fname" id="fname">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="lname" id="lname">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password">

                    </div>
                    <div class="form-group col-lg-12">
                        <label>Profile</label>
                        <input type="file" class="form-control" name="profilepic" >

                    </div>
                    <!-- <small class="form-text text-muted">By Signing up,I agree to the <a href="#"
                            class="link-info">terms. </a></small> -->
                    <button type="submit" name="save" class="btn m-1 btn-primary col-lg-12">Register</button>
                </div>
            </form>
        </div>
    </div>

    


</body>

</html>