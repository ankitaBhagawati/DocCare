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
    include'include/header.php'



     ?>
    <div class="content" style="
    margin-left: 80px;
">
        <h1 class="h3 mb-4 mt-5 text-gray-800">Doctor Schedule Management</h1>

        
        <span id="message"></span>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Doctor Schedule List</h6>
                    </div>
                    <div class="col" align="right">
                        <a href="doctor-appointment-scheduling.php">
                        <button type="button" name="add_exam" 
                            class="btn btn-success btn-circle btn-sm"><i
                                class="fas fa-plus"></i></button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="doctor_schedule_table" width="100%" cellspacing="0">
                        <thead>
                            <tr>                    
                                <th>Schedule Date</th>
                                <!-- <th>Schedule Day</th> -->
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Consulting Time</th>
                                <!-- <th>Status</th>
                                <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                         
                          <?php 
                          if(isset($_COOKIE['doc_id'])){
                          $doc_id=$_COOKIE['doc_id'];
                        //   $current_month=date('F Y');
                            include 'conne.php';
                             $q = "SELECT * FROM `doctor_availability` where `doc_id`='$doc_id' ORDER BY `day_of_week` desc ";
                              $query = mysqli_query($conn,$q);
                       while ( $res = mysqli_fetch_assoc($query)){
                                ?>
                        <tr>
                    <td>
                         <!-- date -->
                        <?php 
                        
                        $date1=$res['day_of_week'];
                        $time1 = strtotime($date1);
                        $newformat = date('d/m/Y',$time1);
                        echo "$date1";
                        // echo"$date1";
                        // echo $res['day_of_week']; ?> 
                    </td>
                                <!-- <th>
                                 
                                    <?php
                                    $date=$res['day_of_week'];
                                    $time = strtotime($date);
                                    $newformat = date('d/m/Y',$time);
                                        $day = date('D',strtotime( $newformat));
                                        echo"$day";
                                        echo"$time";

                                    ?>



                                </th> -->
                                <td> <?php  echo $res['start_time']; ?>   </td>
                                <td> <?php  echo $res['end_time']; ?></td>
                                <td> <?php  echo $res['average_consulting_time']; ?> Minutes</td>
                                <!-- <td> <?php  echo $res['status']; ?></td>
                                <th>Action</th> -->
                                </tr>
                                <?php 
                       }
                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Appointment Scheduling Modal -->


        



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