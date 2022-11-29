<?php 
session_start();
ob_start();
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
    <title>Manger login</title>
</head>

<?php include'include/navbar.php' ?>
<body style="
    padding-left: 0px;">


    <!-- <div class="top-bar col-lg-12 d-flex text-dark justify-content-center">
        <div class="login-top-bar  text-lg">
            <a href="manager-login.php" class="link-secondary">
                Login
            </a>
        </div>

        <div class="login-top-bar ">
            <a href="clinic-manager-registration.php" class="link-secondary">
                Register
            </a>
        </div>

    </div>
    <hr class=" top-bar-hr col-lg-8 mx-auto "> -->
    <?php
   include("conne.php");
  
     if(isset($_POST['logins']))
  {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
            $sql1="select * from `manager` where `email` = '$email' and `registration_status`= '1' ";
        //  echo"$email";
        $results=mysqli_query($conn,$sql1); 
        // print_r($results);
        $count = mysqli_num_rows($results); 
        if($count>0) 
        {
                $rows= mysqli_fetch_array($results);
                
                if(password_verify($password,$rows['password']))
                {
                    echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-key'></i>
                    Plaaaaaaaa right
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                  
                // echo"succes";
                
                }
                else{
                    $id=$rows['manager_id'];
                    $_SESSION['manager_id'] =$id;
                    header("location: manager-home.php");
                   
                    // echo"$rows";
                
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





?>
    <div class="doc-reg">
        <div class="doc-reg-image img-responsive col-lg-6 col-sm-12">
            <img src="images/health.jpg" alt="">


        </div>

        <div class="doc-reg-form col-lg-6 col-sm-12">

            <form method="post">
                <div class="form-border border rounded-3 p-3 border-muted col-lg-9 shadow">
                    <div class="reg-head col-lg-12 text-primary text-center">
                        Manager Login
                    </div>

                    <div>
                        <p class="bg-success text-white px-4"> <?php 
                    //if(isset($_SESSION['msg'])){
                        //echo $_SESSION['msg'];
                    //}else{
                        //echo $_SESSION['msg']="You're logged out";
                    //}
                  ?> </p>

                    </div>

                    <hr class="my-4">


                    <div class="form-group col-lg-12">
                        <label>Email address</label>
                        <input type="email" class="form-control"  name="email">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">

                    </div>

                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me.</label>
                    </div> -->

                    <input type="submit" class="btn m-1 btn-primary col-lg-12" value="Log In" name="logins">
                    <!-- <button type="submit" name="glogin" class="btn btn-success m-1 col-lg-12"><i class="fab fa-google p-2"></i>Login in with google</button> -->
            </form>
        </div>
    </div>

    
  
    </div>
</body>

</html>