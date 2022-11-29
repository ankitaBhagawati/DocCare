<?php 

session_start();
     include 'conne.php';
     
    if(!isset($_COOKIE['email']) ){
        header('location:doctor-login.php');
        }
        if(!isset($_SESSION['email']) ){
$_SESSION['email']=$_COOKIE['email'];


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

    <title>Doctor</title>
</head>

<body style="
    padding-left: 0px;">
    <?php 
    include'include/header.php'



     ?>


<?php 
     include 'conne.php'; 


     $doc_id=$_COOKIE['doc_id'];
 

 $q7 = "SELECT  `useraccount`.*, `booking`.*
 FROM `useraccount`

RIGHT JOIN `booking` ON `useraccount`.`user_id` = `booking`.`user_id`
where  `booking`.`doc_id`='$doc_id'";


 $query7 = mysqli_query($conn,$q7);

$booking= mysqli_num_rows($query7);
$q8 = "SELECT  `useraccount`.*, `booking`.*
                 FROM `useraccount`
                              
                 RIGHT JOIN `booking` ON `useraccount`.`user_id` = `booking`.`user_id`
                where  `booking`.`doc_id`='$doc_id' and `booking`.`date` = date_format(curdate(), '%d/%m/%Y') ORDER BY `date`";
                         
  
                                $query8 = mysqli_query($conn,$q8);
                                $booking2= mysqli_num_rows($query8);

?>
<!-- dashboard start -->
<div class="content" style="margin-left:80px;">
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-muted">Dashboard</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="doctor-booking.php" class="text-decoration-none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Bookings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo"$booking";?>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                       
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="doctor-booking-today.php" class="text-decoration-none">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Todays Booking</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo"$booking2";?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        
                  
                    </div>
                    </div>







<!-- dashboard end -->
    <div class="d-flex mt-5 header-top justify-content-center flex-row bd-highlight mt-5 mb-3">
        <div class="p-2 bd-highlight">

            <?php 
                    $doc_id=$_COOKIE['doc_id'];
                    $sql="select * from `doctor-registration` where doc_id = '$doc_id'";
                        
                        $result=mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result);
                    
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
        </div>


    </div>
    <div class="d-flex mt-5 header-top justify-content-center flex-row bd-highlight ">
        <div class="form-border border rounded-3 p-3 border-muted col-lg-5 shadow">
           
<?php
            $doc_id=$_COOKIE['doc_id'];
$q4 = "SELECT * FROM `clinic`  WHERE  doc_id!='$doc_id'  ";

  $query4 = mysqli_query($conn,$q4);
  
 $res4 = mysqli_num_rows($query4);
  $q3 = "SELECT * FROM `doctor-registration`  WHERE regnumber!= '' and doc_id='$doc_id' ";

  $query3 = mysqli_query($conn,$q3);
  $res3 = mysqli_num_rows($query3);
 


if(($res3 & $res4)>0){
  ?>
            <div class="fs-2 col-lg-12 text-dark text-center">
            <?php 
            
            $q1 = "SELECT * FROM `doctor-registration`  WHERE `verification_status`= '0' and `doc_id`='$doc_id' ";

             $query1 = mysqli_query($conn,$q1);
            $res1 = mysqli_num_rows($query1);
            print_r($res1);
            if(($res1)>0){
            ?>

                <p class="fs-5">  Wait for Admin To Verify Your details</p> 
                <!-- Button trigger modal -->
                <!-- <a href="doctor-profile.php">
                    <button type="button" class="btn btn-primary">
                        Click to Build Your Profile
                    </button></a> -->
            </div>

        <?php }



    }else{?>


            <div class="fs-2 col-lg-12 text-dark text-center">
                Build your profile

                <p class="fs-5">Personal Information</p>
                <!-- Button trigger modal -->
                <a href="doctor-profile.php">
                    <button type="button" class="btn btn-primary">
                        Click to Build Your Profile
                    </button></a>
            </div>



            <?php }?>
            <?php 
            
            $q = "SELECT * FROM `doctor-registration`  WHERE `verification_status`= '1' and `doc_id`='$doc_id' ";

             $query = mysqli_query($conn,$q);
            $res = mysqli_num_rows($query);
            if(($res)>0){
            ?>
            <div class="fs-2 col-lg-12 text-dark text-center">
                Create Appointment 

                <p class="fs-5">New Appointment</p>
                <!-- Button trigger modal -->
                <a href="doctor-appointment.php">
                    <button type="button" class="btn btn-primary">
                        Click to Build Appointment
                    </button></a>
            </div>
            <?php }
            ?>
        </div>
    </div>





</body>

</html>