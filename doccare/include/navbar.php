<?php
 include 'conne.php';


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://localhost/doccare/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">

    <title></title>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-red navbar-dark">
        <!-- <div class="wrapper"> </div> -->
        <div class="container-fluid all-show"> <a class="navbar-brand" href="#">
                <span class="nav_logo-name">Doc Care</span> </a> <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="index">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="article">article</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Services</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="doctor-lists">Doctors</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#">contact</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-search"></i></a> </li>
                </ul>
                </div>
                <!-- <div class="ms-auto "> -->
                <?php 
                 if(isset($_SESSION['user_id'])){
                $user_id=$_SESSION['user_id'];
                $q = "SELECT * FROM `useraccount` where `user_id`='$user_id'";
                $query = mysqli_query($conn,$q);
                $res3 = mysqli_fetch_array($query);
                 }
                    if(isset($_SESSION['user_id'])){
                      
                   
                        
                    ?>
                                         <div class="header_img ">
                   
                   
                <img src="<?php echo $res3['profilepic'];?>" alt="">
                    </div>
                <div class="dropdown ">
                        <img src="<?php ?>" alt="" >
                        <button class="btn btn-bg-light text-light rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">

                        </button>
                        <ul class="dropdown-menu "
                            aria-labelledby="dropdownMenuButton2">
                            
                            
                            
                            <!-- <li><a class="dropdown-item" href="patient-booking.php">Profile</a></li> -->
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li> -->
                            <li><a class="dropdown-item" href="user-logout.php">Logout</a></li>
                        </ul>
                        <a class="text-white mr-1" href="patient-booking.php">Booking Details</a></li>
                    </div>
                <?php }?>

           
            <!-- </div> -->

        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        < script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity = "sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>