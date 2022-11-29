<?php 

session_start();
include 'conne.php';
if(!isset($_SESSION['user_id']) ){
    header('location:patient-login.php');
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
    <!-- <link rel="stylesheet" href="https://localhost/doccare/css/style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">

    <title>Patient</title>
</head>

<body>
    <?php 

        include'include/navbar.php';
           
    



     ?><div class="containers">
         <!-- py-5 -->
        <section class=" m-5">
            <div class=" py-4">
                <!-- <header class="text-center mb-5 pb-5 text-white">
             <h1 class="display-4">Bootstrap vertical tabs</h1>
             <p class="font-italic mb-1">Making advantage of Bootstrap 4 components, easily build an awesome tabbed interface.</p>
             <p class="font-italic">Snippet by
                 <a class="text-white" href="https://bootstrapious.com/">
                     <u>Bootstrapious</u>
                 </a>
             </p>
              </header> -->


                <div class="row">
                    <div class="col-md-2">
                        <!-- Tabs nav -->
                        <div class="nav  d-flex justify-content-start flex-column flex-column nav-pills nav-pills-custom"
                            id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-links mb-3 p-3 shadow active" id="v-pills-profile-tab" data-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">
                                <i class="fas fa-calendar-week mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Bookings</span></a>
                            <a class="nav-links mb-3 p-3 shadow " id="v-pills-home-tab" data-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class="fas fa-user-check mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Profile</span></a>



                            <!-- <a class="nav-links mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill"
                                 href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                 aria-selected="false">
                                 <i class="fa fa-star mr-2"></i>
                                 <span class="font-weight-bold small text-uppercase">Reviews</span></a> -->

                            <!-- <a class="nav-links mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill"
                             href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                             <i class="fa fa-check mr-2"></i>
                             <span class="font-weight-bold small text-uppercase">Confirm booking</span></a> -->
                        </div>
                    </div>


                    <div class="col-md-10">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade shadow rounded bg-white   p-5 w-100" id="v-pills-home"
                                role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h4 class="font-italic mb-4 text-primary">Personal information</h4>
                                <?php
             $user_id=$_SESSION['user_id'];
            // $Id = mysqli_real_escape_string($conn, $_GET['userid']);
 $q = "SELECT * FROM `useraccount`  WHERE user_id= '$user_id'";
 $query = mysqli_query($conn,$q);
$res = mysqli_fetch_assoc($query);


 ?>
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <?php 
                                
                                $data=$res['profilepic'];;
                                $abc =substr($data,strpos($data,"/")+1);
                                if($abc!=""){
                                    ?>
                                <img src="<?php echo htmlspecialchars($res['profilepic']); ?>" alt="Admin"
                                    class="rounded-circle" width="150">
                                <?php
                                }else{
                                    ?>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <?php
                                }
                                
                                
                                
                                
                                ?>





                                <div class="mt-3 text-dark">
                                    <h4><?php echo "&nbsp;"; echo htmlspecialchars($res['firstname']); echo "&nbsp;";echo $res['lastname'];?>
                                    </h4>
                
                                    <p class="text-muted font-size-sm"><?php echo $res['email'];?></p>
                                    <p class="text-secondary mb-1">
                                        <?php echo $res['phone'];?>
                                    </p>
                                    <!-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <!-- <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Personal Details</h5>

                            </div> -->
                            <div class="row mt-2">
                                <div class="col-sm-3 ">
                                    <h6 class="mb-0 text-dark">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo htmlspecialchars($res['firstname']); echo "&nbsp;";echo $res['lastname'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 text-dark" >Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['email'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 text-dark">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['phone'];?>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['city'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['state'];?>
                                </div>
                            </div> -->


                        </div>
                    </div>
                    </div>
                            </div>
                                <!-- <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
                            </div> 
                            <!-- patient booking history -->
                            <div class="tab-pane fade shadow rounded bg-white show active p-5 w-100"
                                id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <h4 class="font-italic mb-4 text-primary">Bookings History</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" 
                                        cellspacing="0" id="doctor_schedule_table">
                                        <thead>
                                            <tr>
                                                <th> Sl No.</th>
                                                <th> Booking No.</th>
                                                <th>Doctor Name</th>

                                                <th>Date</th>
                                                <th>Time Slot</th>
                                                <!-- <th>Booking Details</th> -->
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                    include 'conne.php'; 


                                $user_id=$_SESSION['user_id'];
                                
 
                                $q = "SELECT  `doctor-registration`.*, `booking`.*
                                FROM `doctor-registration`
                              
                              RIGHT JOIN `booking` ON `doctor-registration`.`doc_id` = `booking`.`doc_id`
                              where  `booking`.`user_id`='$user_id' ";
  
                                $query = mysqli_query($conn,$q);
                                     $counter = 0;
                                while ($res = mysqli_fetch_array($query))
                               
                          {
    
                                    ?>

                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><?php  echo $res['booking_id']; ?></td>
                                                <td> <?php echo $res['saluation'];echo".";echo "&nbsp;";echo $res['fname'];echo "&nbsp;";echo $res['lname'];?>
                                                </td>

                                                <td> <?php echo $res['date'];?> </td>
                                                <td> <?php echo $res['time_slot'];?> </td>
                                                <!-- <td> <a class="button "
                                                        href="admin-doctor-profile-view.php?Id=<?php echo $res['doc_id']; ?>">
                                                        <button class="btn btn-primary btn-sm">Details </button></a>
                                                </td> -->
                                                <?php if($res['status']=="1"){ ?>
                                                <td class="text-primary">Accepted<i
                                                        class="fas fa-check-circle text-primary ms-1"></i></td>

                                                <?php } 
                                                
                                                
                                                
                                                
                                                else if($res['status']=="0") { ?>
                                                <td class="text-danger"> Rejected/Not visited<i
                                                        class="fas fa-times-circle text-danger ms-1"></i></td>
                                                <?php } else if($res['status']=="2") { ?>
                                                <td class="text-danger"> cancelled<i
                                                        class="fas fa-times-circle text-danger ms-1"></i></td>
                                                <?php } else if($res['status']=="3") { ?>
                                                <td class="text-success">Visited <i
                                                        class="fas fa-check-circle text-success ms-1"></i></td>
                                                <?php } ?>
                                                <?php if($res['status']=="0"){ ?>
                                                <td> <a class="button " href="doctor-lists.php"> <button
                                                            class="btn btn-primary btn-sm">Book again </button></a></td>
                                                <?php } else if($res['status']=="1") { ?>
                                                <td class="d-grid gap-3"> <a class="button "
                                                        href="patient-booking-cancel.php?Id=<?php echo $res['booking_id']; ?>">
                                                        <button class="btn btn-outline-danger btn-sm">Cancel
                                                        </button></a>
                                                        <a class="button "
                                                        href="payment.php?Id=<?php echo $res['fees']; ?>">
                                                        <button class="btn btn-primary btn-sm">Pay Now
                                                        </button></a>
                                                    </td>
                                                <?php } else if($res['status']=="2") { ?>
                                                <td> <a class="button " href="doctor-lists.php"> <button
                                                            class="btn btn-primary btn-sm">Book Again </button></a></td>

                                                <?php } else if($res['status']=="3") { ?>
                                                <td> 
                                                    <!-- <a class="button " href=""> <button
                                                            class="btn btn-outline-primary btn-sm">Revisit </button></a> -->
                                                            <a class="button " href="patient-prescription.php?Id=<?php echo $res['booking_id'];?>&docid=<?php echo $res['doc_id'];?>"> <button
                                                            class="btn btn-outline-primary btn-sm mt-1" >Prescription </button></a>
                                                </td>
                                                <?php } ?>

                                            </tr>
                                            <?php
                              }
                            //   else{
                            //       echo"You have not done any booking yet";
                            //   }
                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <!-- Data Table js cdn -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#doctor_schedule_table').DataTable();
        });
    </script>    
</body>

</html>