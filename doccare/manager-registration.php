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
    include'include/navbar.php'


  ?>
    <?php

include 'conne.php';

if(isset($_POST['save']))
{
$clinicid = $_GET['token'];
$FirstName = $_POST['fname'];
$LastName = $_POST['lname'];
$Email = $_GET['mail'];
$Password = $_POST['password'];
$hash = password_hash($password,PASSWORD_BCRYPT);
// $Token= bin2hex(random_bytes(15));

if($_SERVER["REQUEST_METHOD"] == "POST") {
   
            $query="UPDATE `manager` SET `fname`='$FirstName',`lname`='$LastName',`password`='$hash' where `email`='$Email'";
    // $query ="INSERT INTO `manager` ( `clinicid`,`fname`, `lname`,`email`, `password`,`registration_status`) VALUES ( '$clinicid','$FirstName', '$LastName' , '$Email','$hash','1')";
    $querys = mysqli_query($conn,$query);
    if($querys>0)
    {
        echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
        Registration Successful.Please wait for the doctor to verify your details.
        
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
     
    }else{
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
        Please Contact the doctor
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
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
    <hr class=" top-bar-hr col-lg-8 mx-auto "> -->
    <div class="mt-5"></div>
    <div class="doc-reg col-sm-12">
        <div class="doc-reg-image img-responsive col-lg-6 col-sm-12">
            <img src="images/health.jpg" alt="">


        </div>

        <div class="doc-reg-form col-lg-6 col-sm-12 ">

            <form method="post">
                <div class="form-border border rounded-3 p-3 border-muted col-lg-9 shadow">
                    <div class="reg-head col-lg-12 text-primary text-center">
                        Manager Registration
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
                        <label>Clinic Name </label>

                        <select class="form-select" name="clinicid" aria-label="Default select example">
                            <!-- <option >Select</option> -->
                            <?php
                        $clinicid = $_GET['token'];
                        $query="select * from `clinic` where `clinicid`='$clinicid'";

                        $result=mysqli_query($conn,$query);
            $rows=mysqli_fetch_assoc($result)
            
              ?>
                            <option value="<?php echo$rows['clinicid'];?>" selected> <?php echo$rows['clinicname']; ?>
                            </option>
                        </select>

                        <!-- <div class="form-group col-lg-12">
                        <label>Email address</label>

                        <input type="email" class="form-control" id="email" name="email">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div> -->
                        <div class="form-group col-lg-12">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password">

                        </div>
                        <small class="form-text text-muted">By Signing up,I agree to the <a href="#"
                                class="link-info">terms. </a></small>
                        <button type="submit" name="save" class="btn m-1 btn-primary col-lg-12">Register</button>

            </form>
        </div>
    </div>


    
    
</body>

</html>