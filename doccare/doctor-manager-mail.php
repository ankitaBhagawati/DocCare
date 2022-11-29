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
    <title>Manager</title>

<body style="
    padding-left: 0px;">
    <?php 
    include'include/header.php'


  ?>

    <?php
include 'conne.php';
$doc_id=$_COOKIE['doc_id'];
$query="select * from `clinic` where `doc_id`='$doc_id'";

$result=mysqli_query($conn,$query);
$res = mysqli_fetch_array($result);
$clinicid= $res['clinicid'];

if(isset($_POST['save']))
{
    
$Email = $_POST['email'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $q =" select * from `manager` where email ='$Email'"; 
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

    $query ="INSERT INTO `manager` ( `email`,`clinicid`) VALUES (  '$Email','$clinicid')";
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
         $mail->Body    = "Hi, .Click here to start the process of registration http://localhost/doccare/manager-registration.php?mail=$Email&token=$clinicid to activate your account";
        // $mail->Body    = file_get_contents("mail.php");
        
        
        
       
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // $_SESSION['msg']="check your mail to activate your account $email";
        echo"
        <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
      Email send to the Manager Successfully
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

}

    }
    
    // $query ="INSERT INTO `manager` ( `clinicid`,`fname`, `lname`,`email`, `password`,`token`) VALUES ( '$clinicid','$FirstName', '$LastName' , '$Email','$Password','$Token')";
    // $query = mysqli_query($conn,$query);
    // if($query)
    // {
    
    //     $subject = "Verify your email";
    //     $body = "Hi, $FirstName. click on this link to verify your email http://localhost/googleapi/activate.php?token=$Token";
    //     $headers = "From: doccare11@gmail.com";

    //     if (mail($Email, $subject, $body, $headers)) {
    //         $_SESSION['msg']="check your mail to verify your account";
    //         header('location:manager-login.php');
    //         } else {
    //             echo "Email sending failed...";
    //                 }
    // }

    }
}
?>
    <!-- <div class="top-bar mt-5 col-lg-12 d-flex text-dark justify-content-center">
        <div class="login-top-bar  text-lg">
            <a href="manager-login.php" class="link-secondary">
                Login
            </a>
        </div>

        <div class="login-top-bar ">
            <a href="manager-registration.php" class="link-secondary">
                Register
            </a>
        </div>

    </div>
    <hr class=" top-bar-hr col-lg-8 mx-auto ">
    <div class="doc-reg col-sm-12">
        <div class="doc-reg-image img-responsive col-lg-6 col-sm-12">
            <img src="images/health.jpg" alt="">


        </div> -->
    <div class="content" style="margin-left: 10%;">
        <div class="row">
            <div class="col-lg-6">
                <!-- part1 -->
                <?php 
                    $q="SELECT * FROM `manager-mapping` where `doc_id`='$doc_id'";
                    $query = mysqli_query($conn,$q);

                    $res = mysqli_num_rows($query);
                    // print_r($q);
                    if($res>0){
                    
                    ?>
                <div class="doc-reg-form col-lg-12 col-sm-12 ">

                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-border border rounded-3 p-3 border-muted col-lg-9 shadow">
                            <div class="reg-head col-lg-12 text-primary text-center">
                                Manager Registration
                            </div>



                            <hr class="my-4">
                            <div class="form-group col-lg-12">
                                <label>Email</label>
                                <small class="form-text text-muted"> email-id of the manager </small>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <button type="submit" name="save" class="btn mt-1 btn-primary col-lg-12">Send Email</button>
                        </div>
                    </form>
                </div>

                <?php 
                    }
                ?>
            </div>
            <div class="col-lg-6">
                <!-- part 2 -->
                <?php 
                    if(isset($_POST['submit']))
                    {
                    
                    //$managerid = $_GET['manager_id'];
                
                    $manager_id=$_POST['manager_id'];
                    // echo"$manager_id";
                    if($_SERVER["REQUEST_METHOD"] == "POST") {

                        $checkqry="Select *  `manager-mapping` where  `doc_id`='$doc_id'";
                        $rslt=mysqli_query($conn,$checkqry);
                        $rsltno=mysqli_num_rows($rslt);
                        if($rsltno>0){
                            echo"  <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
                            Mapping Already
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        }else{

                        
                        
                        $query ="INSERT INTO `manager-mapping` ( `manager_id`,`doc_id`) VALUES ( '$manager_id','$doc_id')  ";
                    $qs1=mysqli_query($conn,$query);
                        $query2 = "UPDATE `manager` SET `manager_id`='$manager_id', `registration_status`='1' where  `manager_id`='$manager_id'";
                        $qs2=mysqli_query($conn,$query2);
                        $query1= "SELECT  `manager-mapping`.*, `manager`.*
                        FROM `manager-mapping`
                    
                    RIGHT JOIN `manager` ON `manager-mapping`.`manager_id` = `manager`.`manager_id`
                    where  `manager-mapping`.`doc_id`='$doc_id' ";
                        $result = mysqli_query($conn,$query1);
                        $row=mysqli_fetch_assoc($result);
                        $emailnew=$row['email'];
                        // echo"$emailnew";
                        if(($qs1&$qs2)>0){
                                        echo"
                                <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
                            Manager set  Successfully
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
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
                    $mail->addAddress($emailnew);    // Add a recipient

                    $mail->addReplyTo('no-reply@gmail.com', 'no reply');

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Your Details are Verified Successfully';
                    $mail->Body    = "Hi, .Your registration process is complete. Click here to login https://localhost/doccare/manager-login";
                    // $mail->Body    = file_get_contents("mail.php");
                    
                    
                    
                    
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    // $_SESSION['msg']="check your mail to activate your account $email";
                    echo"
                    <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
                    Email send to the Manager Successfully
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



                            }
                        //     echo("<script>alert('Doctor Entry Done')</script>");
                        //  echo("<script>window.location = 'welcome-manager.php';</script>");
                        }
                        
                        }
                        
                    }
                        
                    ?>



                <div class="doc-reg-form col-lg-12 col-sm-12 ">

                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-border border rounded-3 p-3 border-muted col-lg-9 shadow">
                            <div class="reg-head col-lg-12 text-primary text-center">
                                Manager Maping
                            </div>



                            <div class="form-group col-lg-12">
                                <label class="text-center">Choose manager who will control your bookings from your
                                    clinic </label>
                                                <?php
                        $q = "SELECT  `clinic`.*, `manager`.*
                            FROM `clinic`
                        
                        RIGHT JOIN `manager` ON `clinic`.`clinicid` = `manager`.`clinicid`
                        where  `clinic`.`doc_id`='$doc_id' ";
                            $result = mysqli_query($conn,$q);

                            ?>
                                <select class="form-select" name="manager_id" aria-label="Default select example">
                                    <!-- <option selected>Select</option> -->
                                    <?php
                                    // $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                        //  print_r($row);
                                            ?>
                                    <option value="<?php echo $row["manager_id"]; ?>">
                                        <?php echo $row["fname"]; echo"&nbsp;"; ?><?php echo $row["lname"]; ?></option>
                                    <?php
                                    // $i++;
                                    }
                                        ?>
                                </select>
                                <button type="submit" name="submit" class="btn m-1 btn-primary col-lg-12">
                                    Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
   </div>


    <!-- table -->

    <div class="content" >
        <h1 class="h3 mb-4 mt-5 text-gray-800">Manager Details</h1>


        <span id="message"></span>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Your manager</h6>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="80%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Sl No.</th>
                                <th>Clinic Manager Name</th>

                                <th>Email</th>
                                <th>Phone</th>
                                <!-- <th>View Record</th> -->
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    include 'conne.php'; 


                                    $doc_id=$_COOKIE['doc_id'];
                                
 
                                $q = "SELECT  `clinic`.*, `manager`.*
                                FROM `clinic`
                              
                              RIGHT JOIN `manager` ON `clinic`.`clinicid` = `manager`.`clinicid`
                              where  `clinic`.`doc_id`='$doc_id' ";
                            // $q ="select * from `booking` ";
  
                                $query = mysqli_query($conn,$q);
                                     $counter = 0;
                                while ($res = mysqli_fetch_array($query))
                               
                          {
    
                                    ?>

                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td> <?php echo $res['fname'];echo "&nbsp;";echo $res['lname'];?>
                                </td>

                                <td> <?php echo $res['email'];?> </td>
                                <td> <?php echo $res['phone'];?> </td>
                                <?php if($res['registration_status']=="1"){ ?>
                                <td class="text-primary">Activated<i class="fas fa-check-circle text-primary ms-1"></i>
                                </td>

                                <?php } else  { ?>
                                <td class="text-danger"> Not Activated<i
                                        class="fas fa-times-circle text-danger ms-1"></i></td>
                             </tr>
                                <?php }
                          }
                                ?>
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</body>

</html>