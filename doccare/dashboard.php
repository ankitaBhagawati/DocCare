<?php 

session_start();
     include 'conne.php';
     
//     if(!isset($_COOKIE['id']) ){
//         header('location:admin-login.php');
//         }
//         if(!isset($_SESSION['email']) ){
// $_SESSION['email']=$_COOKIE['id'];


//         }
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
    <style>
        /* .show {

            width: 100%;
            "

        } */
    </style>
    <title>Doctor</title>
</head>

<body style="
    padding-left: 0px;">
    <?php 
    include'include/header.php'



     ?>


    <div class="d-flex mt-5 header-top justify-content-center flex-row bd-highlight mt-5 mb-3">
        <div class="p-2 bd-highlight">

            <?php 
        $id=$_COOKIE['id'];
        $sql="select * from `useraccount` where user_id = '$id'";
               
              $result=mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result);
        
        ?>
            <h1>Welcome <?php echo"$row[firstname]";?> </h1>
            <?php
    
  
        
    if(isset($_SESSION['msg'])){
      
      $error= $_SESSION['msg']; 
      echo "
      <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'>
      $error
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
     
         unset($_SESSION['msg']); 

         }
  ?>
        </div>


    </div>
    <div class="d-flex mt-5 header-top justify-content-center flex-row bd-highlight ">
        <div class="form-border border rounded-3 p-3 border-muted col-lg-5 shadow">
            
        </div>
    </div>





</body>

</html>