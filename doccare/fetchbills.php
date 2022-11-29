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
<?php

include("conne.php");
$dt ='30/08/2021';
$doc ='33';
// $sql = "SELECT * FROM `doctor_availability` where day_of_week='$dt' and `doc_id`='34'";
$sql =  "SELECT  `doctor-registration`.*, `doctor_availability`.*
FROM `doctor-registration`
RIGHT JOIN `doctor_availability` ON `doctor-registration`.`doc_id` = `doctor_availability`.`doc_id`

where `doctor-registration`.`doc_id`='$doc ' and `doctor_availability`.`day_of_week`='$dt '";


$result = mysqli_query($conn, $sql) or die("error");

$row1 = mysqli_fetch_assoc($result);


$duration =$row1['average_consulting_time'];
$cleanup = 0;
$start = $row1['start_time'];
$end = $row1['end_time'];

// echo"$id";

// if ($result) {
//     while ($row = mysqli_fetch_array($result)) {

//         // echo $row[0] . "<br>";
//         echo "<form method='post' action=''>"
//             ."<input type='button' name='det' value='" . $row['doc_id'] . "'  /></form>"
//             ."<div class='radio col btn btn-primary' >". $row['start_time'] ."-". $row['end_time'] ."</div>"
        
//             ."<div id='show'></div>";
//     }
// }






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
 <!-- <div class="container mb-5"> -->
            <!-- <form method="post"> -->
              <!-- <div class="col-lg-8 m-1">
                <div class="row"> -->
                  <div class="radio-group ">
                    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
                     foreach($timeslots as $ts){
                     ?>
                    <div class="radio col btn btn-primary mb-3" data-value="<?php echo $ts; ?>" <?php echo $ts; ?>>
                      <?php echo $ts; ?></div>
                     

                    <?php } ?>
                    <button type="button" class="btn btn-info text-light mt-2"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <b>Book Appointment</b>
                                            </button>
                    <input type="text" id="radio-value" name="radio-value" disabled />
                  </div>
                <!-- </div>
              </div> -->
            <!-- </form> -->


          <!-- </div> -->
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
      $(this).parent().find('input').val(val);
    });
  </script>