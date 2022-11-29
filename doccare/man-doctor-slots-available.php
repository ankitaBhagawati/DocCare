<?php session_start();
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
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"
    integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>

  <style>
    .radio-group {
      /* position: relative; */
    }

    /* div :first-child {
    margin-top: 0px;
  } */

    .radio {
      /* display: inline-block; */
      /* width: 100px;
    height: 50px; */
      /* border-radius: 100%; */
      /* background-color: lightblue;
    border: 2px solid lightblue; */
      cursor: pointer;
      /* margin: 2px 0; */
    }

    .radio.selected {
      background-color: #fff;
      color: #2574a9;
      border-color: #2574a9;
    }
  </style>
</head>

<body>

  <?php 
    include'include/header.php'


  ?>
  <div class="container mx-auto m-5">
    <div class="card col-lg-8 rounded-top mt-4 rounded-3">
      <div class="card-header bg-primary">
        <p class="text-center text-white fs-2 fw-bold">Booking</p>

      </div>
      <div class="card-body ">

        <?php

include("conne.php");
$dt =$_GET['id'];
  $doc =$_GET['doc'];
//   $user_id=$_SESSION['user_id'];
  $token=$_SESSION['user_id'];

  $checkqry1="SELECT * FROM `useraccount` where `token`='$token' ";
  $status1=  mysqli_query($conn,$checkqry1);
  $res = mysqli_fetch_assoc($status1);
$user_id=$res['user_id'];
// echo"$user_id";
if(isset($_POST['book'])) {
  $bookingid = BookCode();
  $tokenc= TokenCode();
  $slot = $_POST['radio-value'];
  $reason = $_POST['reason'];
  $checkqry="SELECT * FROM `booking` where `doc_id`='$doc' and `date`='$dt'   and `user_id`='$user_id'";
  $status=  mysqli_query($conn,$checkqry);
  $num = mysqli_num_rows($status);

  $checkqry3="  SELECT * FROM `booking` where `time_slot`=' $slot' and `date`='$dt'";
  $status3=  mysqli_query($conn,$checkqry3);
  $nums = mysqli_num_rows($status3);
  // print_r( $checkqry3);
  if($nums >0){
		echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-exclamation-triangle'></i>
     Selected time Slot  $slot already Booked. Please select another slot
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

		}
		else{
     if($num >2){
        echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-exclamation-triangle'></i>
       Booking already done for selected date by the user
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }else{
  $sqlquery="INSERT INTO `booking`( `booking_id`, `doc_id`, `user_id`, `date`, `time_slot`, `status`,`token_number`,`reason`) 
  VALUES ('$bookingid','$doc','$user_id','$dt',' $slot','1','$tokenc','$reason')";
  // 0-reject 1-accept 2-cancelled 3- completed
   $status2=  mysqli_query($conn,$sqlquery);
   if($status2>0){
		echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-clipboard-check'></i>
     Booking successful
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

		}else{
      echo"<div class='alert alert-warning alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-exclamation-triangle'></i>
     Something Went Wrong
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";

       }
       }

}
}
function BookCode()
		{
			// 
      include'conne.php';
     
      $rs  = mysqli_query($conn,"select CONCAT('DOC',LPAD(RIGHT(ifnull(max(booking_id),'DOC00000'),5) + 1,5,'0')) from booking");
      return mysqli_fetch_array($rs)[0];
  		}

      // generate token number

  

      function TokenCode()
      {
        // 
        include'conne.php';
        $doc =$_GET['doc'];
        $dt =$_GET['id'];
              $rs  = mysqli_query($conn,"select LPAD(RIGHT(ifnull(max(token_number),'000'),3) + 1,3,'0') from booking where `doc_id`='$doc' and `date`='$dt'");
        return mysqli_fetch_array($rs)[0];
        }

// $sql = "SELECT * FROM `doctor_availability` where day_of_week='$dt' and `doc_id`='34'";
$sql =  "SELECT  `doctor-registration`.*, `doctor_availability`.*
FROM `doctor-registration`
RIGHT JOIN `doctor_availability` ON `doctor-registration`.`doc_id` = `doctor_availability`.`doc_id`

where `doctor-registration`.`doc_id`='$doc ' and `doctor_availability`.`day_of_week`='$dt '";


$result = mysqli_query($conn, $sql) or die("error");

$row1 = mysqli_fetch_assoc($result);

 
                  if($row1>0){
                    
$duration =$row1['average_consulting_time'];
$cleanup = 0;
$start = $row1['start_time'];
$end = $row1['end_time'];

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
       $endPeriod = clone $intStart;
       $endPeriod->add($interval);
       if($endPeriod>$end){
           break;
       }
       
       $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
       
    }
    
    return $slots;
    }
             ?>
        <h5 class="card-title">Available Time Slots for the selected Date</h5>
        <p class="card-text text-muted">Please select a time slot to Book Your Slot.</p>
        <p class="card-text text-danger">**Note a user can only Book two slot for a day.</p>
        <form action="" method="post">
          <div class="col-lg-8">
          <div class="radio-group ">
                    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
                     foreach($timeslots as $ts){
                     ?>
                    <div class="radio col btn btn-primary mb-3" data-value="<?php echo $ts; ?>" <?php echo $ts; ?>>
                      <?php echo $ts; ?></div>
                     

                    <?php } ?>
                    
                    <input type="text" id="radio-value" name="radio-value" hidden  />
                    
                  </div>
            <div class="col-lg-8">
              <input type="text" name="reason" class="form-control border border-primary"
                placeholder="Please Eloborate your problem" />
                <input type="submit" class="btn btn-info text-light mt-2" name="book" value="Book Appointment">

            </div>
           
          </div>
      
      </form>

      <?php   }else{

                echo"Please Select a date to proceed";
              }
              unset($_SESSION['user_id']); 
                ?>



    </div>
  </div>
  </div>
</body>

</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
  integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</script>

<script>
    $('.radio-group .radio').click(function () {
      $(this).parent().find('.radio').removeClass('selected');
      $(this).addClass('selected');
      var val = $(this).attr('data-value');
      //alert(val);
      $(this).parent().find('#radio-value').val(val);
    });

</script>