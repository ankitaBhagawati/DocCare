<?php
session_start();
include 'conne.php';


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
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <title>Manager</title>
</head>
<body>
    <div class="p-3 mb-2 bg-dark text-white" style="padding-left: 2px;">
    <nav id= "fix" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" style="background-color:#343a40 text:white;">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="hair.php">Profile</a>
        </li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Check</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Appointments</a></li>
      <li><a class="dropdown-item" href="#">Time slots</a></li>
     
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#"> Payments </a></li>
    </ul>

    </div>
  </div>
</nav>
</div>
<div class="row">
  <div class="col-sm-7">
    <div class="card" style="width: 18rem; ">
    <img src="logo.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Hi, <?php echo $_SESSION['fname'];  ?></h5>
        <p class="card-text">Welcome to your profile</p>
      </div>
    </div>
  </div>



  </div>
</div>





<script>
document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        document.getElementById('fix').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('fix').classList.remove('fixed-top');
         // remove padding top from body
        document.body.style.paddingTop = '0';
      } 
  });
}); 

    </script>
</body>
</html>
