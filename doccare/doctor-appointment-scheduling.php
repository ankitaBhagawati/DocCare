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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Doctor</title>
</head>

<body>
<?php 
    include'include/header.php'


  ?>
    <div class=" container mt-5">
    <h1 class="h3 mt-5 d-flex justify-content-center text-gray-800">Register your schedule</h1>

    <?php

include 'conne.php';


if(isset($_POST['create'])){
    $doc_id=$_COOKIE['doc_id'];
   $date=$_POST['doctor_schedule_date'];
   $startTime=$_POST['doctor_schedule_start_time'];
    $endTime=$_POST['doctor_schedule_end_time'];
    $consultingTime=$_POST['average_consulting_time'];
    // $fees=$_POST['fees'];

    $check="select * from `doctor_availability` where `doc_id` = '$doc_id' and `day_of_week`= '$date'";
   
    $result=mysqli_query($conn,$check); //shows the sql query
    $count = mysqli_num_rows($result);
    
    if($count>0){
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-key'></i>
       Appointment already Created for $date
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }else{

    $insertquery ="INSERT INTO `doctor_availability`(`doc_id`, `day_of_week`, `start_time`, `end_time`, `average_consulting_time` ) VALUES ('$doc_id','$date','$startTime','$endTime','$consultingTime')";
       
    $result2 = mysqli_query($conn,$insertquery);
      
    // print_r($result2 );
    if($result2>0){
        echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-key'></i>
        Data inserted Successfully for $date .
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    
    }
    }

}
   ?>








        <div class="  row justify-content-center  mt-5">
            <div class="col-md-5 form-border border rounded-3 p-3 border-primary shadow border-3">
                
            <a href="doctor-appointment.php">
                <i class="fas fa-arrow-left d-flex justify-content-start "></i></a>
                <form action="" method="post">

                    <div class="form-group">
                        <label>Schedule Date</label>
                        <div class="input-group">
                            
                            <input type="text" name="doctor_schedule_date" id="doctor_schedule_date"
                                class="form-control" required  autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <div class="input-group">
                            
                            <input type="text" name="doctor_schedule_start_time" id="doctor_schedule_start_time"
                                class="form-control datetimepicker-input" data-toggle="datetimepicker"
                                data-target="#doctor_schedule_start_time" required onkeydown="return false"
                                onpaste="return false;" ondrop="return false;" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <div class="input-group">
                           
                            <input type="text" name="doctor_schedule_end_time" id="doctor_schedule_end_time"
                                class="form-control datetimepicker-input" data-toggle="datetimepicker"
                                data-target="#doctor_schedule_end_time" required onkeydown="return false"
                                onpaste="return false;" ondrop="return false;" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Average Consulting Time</label>
                        <div class="input-group">
                           
                            <select name="average_consulting_time"  class="form-control"
                                required>
                                <option value="">Select Consulting Duration</option>
                                <?php
                                $count = 0;
                                for($i = 1; $i <= 15; $i++)
                                {
                                    $count += 5;
                                    echo '<option value="'.$count.'">'.$count.' Minute</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>Fees</label>
                        <div class="input-group">
                           
                            <input type="number" name="fees"
                                class="form-control"  autocomplete="off" />
                        </div>
                    </div> -->
                    <input type="submit" name="create" value="Save" class="btn btn-primary col-lg-12 mt-2">

        </form>
            </div>

        </div>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // $(document).ready(function () {

        //     $(function () {
        //         $("#my_date_picker").datepicker({
        //             startDate: date,
        //             autoclose: true,
        //             container: '#add_doctor_schedule'
        //         });

        //     });
        // })
        $(document).ready(function () {
            var date = new Date();
            date.setDate(date.getDate());
            

            $('#doctor_schedule_date').datepicker({
                startDate: date,
                minDate: "+1",
                maxDate: '+10D',
                changeMonth: true,
                dateFormat: 'dd/mm/yy',
            //    dateFormat: "dd/mm/yyyy",
                autoclose: true
            });

            $('#doctor_schedule_start_time').datetimepicker({
                datepicker:false,
                format:'H:i',
                step: 30
            });

            $('#doctor_schedule_end_time').datetimepicker({
                useCurrent: false,
                datepicker:false,
                format:'H:i',
                  step: 30
            });

            $("#doctor_schedule_start_time").on("change.datetimepicker", function (e) {
                // console.log('test');
                $('#doctor_schedule_end_time').datetimepicker('minDate', e.date);
            });

            $("#doctor_schedule_end_time").on("change.datetimepicker", function (e) {
                $('#doctor_schedule_start_time').datetimepicker('maxDate', e.date);
            });
        });
    </script>
</body>

</html>