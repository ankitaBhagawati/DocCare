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
        <link rel="stylesheet" href="vendors/jquery-ui.min.css">
        <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
 
 
    <title>Doctor</title>
</head>

<body>
    <?php 

        include'include/header.php';
           


     ?>
    
    <div class="content" style="
    margin-left: 80px;">
    <h1 class="h3 mb-4 mt-5 text-gray-800">Appointment List</h1>

        
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h6 class="m-0 font-weight-bold text-primary">Upcoming Appointment List</h6>
            </div>
            
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="doctor_schedule_table" width="100%" cellspacing="0">
                <thead>
                <tr>
                                                <th> Sl No.</th>
                                                <th>Patient Name</th>

                                                <th>Date</th>
                                                <th>Time Slot</th>
                                                <th>View Record</th>
                                                <th>Status</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                </thead>
                <tbody>
                                            <?php

                                    include 'conne.php'; 


                                    $doc_id=$_COOKIE['doc_id'];
                                
 
                                $q = "SELECT  `useraccount`.*, `booking`.*
                                FROM `useraccount`
                              
                              RIGHT JOIN `booking` ON `useraccount`.`user_id` = `booking`.`user_id`
                              where  `booking`.`doc_id`='$doc_id' and `booking`.`date` > date_format(curdate(), '%d/%m/%Y') ORDER BY `date`";
                            // $q ="select * from `booking` ";
  
                                $query = mysqli_query($conn,$q);
                                     $counter = 0;
                                while ($res = mysqli_fetch_array($query))
                               
                          {
    
                                    ?>

                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td> <?php echo $res['firstname'];echo "&nbsp;";echo $res['lastname'];?>
                                                </td>

                                                <td> <?php echo $res['date'];?> </td>
                                                <td> <?php echo $res['time_slot'];?> </td>
                                                <td> <a class="button "
                                                        href="admin-doctor-profile-view.php?Id=<?php echo $res['doc_id']; ?>">
                                                        <button class="btn btn-primary btn-sm">Details </button></a>
                                                </td>
                                                <?php if($res['status']=="1"){ ?>
                                                <td class="text-primary">Accepted<i
                                                        class="fas fa-check-circle text-primary ms-1"></i></td>

                                                <?php } else if($res['status']=="0") { ?>
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
                                                <td> <a class="button " href=""> <button
                                                            class="btn btn-danger btn-sm disabled">Rejected/not Visited</button></a></td>
                                                <?php } else if($res['status']=="1") { ?>
                                                <td class="d-grid gap-0"> <a class="button "
                                                        href="doctor-booking-reject.php?Id=<?php echo $res['booking_id']; ?>">
                                                        <button class="btn btn-outline-danger btn-sm">Reject now
                                                        </button></a><br>
                                                        <a class="button "
                                                        href="doctor-booking-visit.php?Id=<?php echo $res['booking_id']; ?>">
                                                        <button class="btn btn-outline-success btn-sm"> Visiting Complete
                                                        </button></a></td>
                                                <?php } else if($res['status']=="2") { ?>
                                                <td> <a class="button " href="doctor-lists.php"> <button
                                                            class="btn btn-danger btn-sm disabled">cancelled </button></a></td>

                                                <?php } else if($res['status']=="3") { ?>
                                                  
                                                <td> <a class="button " href="prescription-create.php?Id=<?php echo $res['booking_id'];?>&docid=<?php echo $_COOKIE['doc_id'];?>"> <button
                                                            class="btn btn-outline-primary btn-sm">Generate Prescription </button></a>
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
<!-- Appointment Scheduling Modal -->






</div>
    
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
