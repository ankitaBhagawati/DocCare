<?php 
ob_start();
session_start();
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
    padding-left: 0px;
    background-color:#fff;">
    <?php include'include/navbar.php' ?>
    <div class="top-bar  mt-5 col-lg-12 d-flex text-dark justify-content-center">
        <div class="login-top-bar  text-lg">
            <a href="doctor-login.php" class="link-secondary">
                Login
            </a>
        </div>

        <div class="login-top-bar ">
            <a href="doctor-registration.php" class="link-secondary">
                Register
            </a>
        </div>

    </div>
    <hr class=" top-bar-hr col-lg-8 mx-auto ">
<?php 
 

include 'conne.php';

if($_SERVER["REQUEST_METHOD"] == "POST")//global var holds info about headers,paths and script location
{
    if(isset($_POST['login']))
  {
        $email = mysqli_real_escape_string($conn,$_POST['email']); //sql injection to remove/escape/sanitize unneccesary characters! secuurity
        $password = mysqli_real_escape_string($conn,$_POST['password']);
            $sql="select * from `doctor-registration` where email = '$email' and registration_status= '1' ";
         
        $result=mysqli_query($conn,$sql); //shows the sql query
        $count = mysqli_num_rows($result); //count var to run if else
        if($count>0) 
        {
                $row = mysqli_fetch_array($result);
                if(password_verify($password, $row['password']))
                {
            //return true for password
                $_SESSION["email"] = $email;                
                setcookie('email',$row['email'],time()+60*60*24*30); //for 1 month
                setcookie('doc_id',$row['doc_id'],time()+60*60*24*30);
                 header('location:doctor-index.php');
                
                }
                else{
                //return false for password
                echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-key'></i>
                Please Enter Correct Password
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                }     
        }
        else
        {
            echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='far fa-envelope'></i>
            Please enter correct email or your email is not verifed
             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";
        
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
    <div class="doc-reg">
        <div class="doc-reg-image img-responsive col-lg-6 col-sm-12 d-none d-lg-block d-xl-block">
            <img src="images/health.jpg" alt="">


        </div>

        <div class="doc-reg-form col-lg-6 col-sm-12 ms-3 ">

            <form method="post"  onsubmit="return validation()">
                <div class="form-border border rounded-3 p-3 border-muted col-lg-9 shadow">
                    <div class="reg-head col-lg-12 text-primary text-center">
                        Doctor Login
                    </div>
                    <div class="link-text text-right col-lg-12">
                        <a href="patient-registration.php" class="link-primary">Not a doctor</a>
                    </div>


                    <hr class="my-4">


                    <div class="form-group col-lg-12">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <span id="emailid" class="text-danger"></span>
                    <div class="form-group col-lg-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="pass">

                    </div>
                    <span id="password" class="text-danger"></span>

                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me.</label>
                    </div> -->
                    
                            <button type="submit" name="login" class="btn mt-2 btn-primary col-lg-12">Log In</button>
                    <!-- <button type="submit" class="btn btn-success m-1 col-lg-12"><i class="fab fa-google p-2"></i>Login in with google</button> -->
            </form>
        </div>
    </div>

    </div>
    <script type="text/javascript">
    function validation() {
       
        var email = document.getElementById('email').value;
        var pass = document.getElementById('pass').value;
        const pass_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&_+=*.]{8,}$/;

       

      if (email == "") {
        document.getElementById('emailid').innerHTML = " ** Please fill the email id";
        return false;
      }
     else {
        document.getElementById('emailid').innerHTML = "";
      }
      if (pass == "") {
        document.getElementById('password').innerHTML = " ** Please fill the password field";
        return false;
      }
       else {
        document.getElementById('password').innerHTML = "";
      }



    }
    </script>

</body>

</html>