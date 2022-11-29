<?php 

session_start();
     include 'conne.php';
     
    if(!isset($_COOKIE['id']) ){
        header('location:admin-login.php');
        }
        if(!isset($_SESSION['email']) ){
$_SESSION['email']=$_COOKIE['id'];


        }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- css stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- fontawesome cdn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <!-- jquery datatable cdn -->
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <title>Doctor</title>
</head>

<body>
    <?php 
    include'include/header.php'



     ?>
    <div class="content" style="
    margin-left: 80px;
">
        <h1 class="h3 mb-4 mt-5 text-gray-800">Doctor Details Management</h1>

        <!-- DataTales Example -->
        <span id="message"></span>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">Doctor Details List</h6>
                    </div>
                    <!-- <div class="col" align="right">
                        <a href="doctor-appointment-scheduling.php">
                        <button type="button" name="add_exam" 
                            class="btn btn-success btn-circle btn-sm"><i
                                class="fas fa-plus"></i></button></a>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="doctor_schedule_table" cellspacing="0">
                        <thead>
                            <tr>
                                <th> Sl No.</th>
                                <th>Doctor Name</th>

                                <th>city</th>
                                <th>View Record</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    include 'conne.php'; 




 
                                $q = "select * from `doctor-registration` ";
  
                                $query = mysqli_query($conn,$q);
                                     $counter = 0;
                                while ($res = mysqli_fetch_array($query))

                          {
    
                                    ?>

                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td> <?php echo $res['saluation'];echo".";echo "&nbsp;";echo $res['fname'];echo "&nbsp;";echo $res['lname'];?>
                                </td>

                                <td> <?php echo $res['city'];?> </td>
                                <td> <a class="button "
                                        href="admin-doctor-profile-view.php?Id=<?php echo $res['doc_id']; ?>"> <button
                                            class="btn btn-primary btn-sm">Details </button></a></td>
                                <?php if($res['verification_status']=="0"){ ?>
                                <td> Not verified</td>
                                <?php } else { ?>
                                <td> Verified<i class="fas fa-check-circle text-primary ms-3"></i></td>
                                <?php } ?>
                                <?php if($res['verification_status']=="0"){ ?>
                                <td> <a class="button "
                                        href="doctor-profile-accept.php?Id=<?php echo $res['doc_id']; ?>"> <button
                                            class="btn btn-primary btn-sm">Verify Now </button></a></td>
                                <?php } else { ?>
                                <td> <a class="button "
                                        href="doctor-profile-reject.php?Id=<?php echo $res['doc_id']; ?>"> <button
                                            class="btn btn-outline-danger btn-sm">Reject Now </button></a></td>
                                <?php } ?>

                            </tr>
                            <?php
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>







    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
</body>

</html>