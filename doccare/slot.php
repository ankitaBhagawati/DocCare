<?php


include 'conne.php';


    // $Id = mysqli_real_escape_string($conn, $_GET['Id']);
    $Id= 34;
    $q2=" SELECT  `doctor-registration`.*, `doctor_availability`.*
    FROM `doctor-registration`
    RIGHT JOIN `doctor_availability` ON `doctor-registration`.`doc_id` = `doctor_availability`.`doc_id`
    
    where `doctor-registration`.`doc_id`='$Id'";
    
  
     $query3 = mysqli_query($conn,$q2);
     $res3 = mysqli_fetch_assoc($query3);
    
     $duration =$res3['average_consulting_time'];
     $cleanup = 0;
     $start = $res3['start_time'];
     $end = $res3['end_time'];



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


<!doctype html>
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
    type="text/css">
  <title></title>

</head>
<style>
  .radio-group {
    position: relative;
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

<body>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button>

  <!-- Modal -->
  <div class="modal fade " id="staticBackdrop"  tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container mb-5">
            <form method="post">
              <div class="col-lg-12 m-3">
                <div class="row">
                  <div class="radio-group ">
                    <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
               foreach($timeslots as $ts){
              ?>
                    <div class="radio col btn btn-primary" data-value="<?php echo $ts; ?>" <?php echo $ts; ?>>
                      <?php echo $ts; ?></div>


                    <?php } ?>
                    <input type="text" id="radio-value" name="radio-value" disabled />
                  </div>
                </div>
              </div>
            </form>


          </div>
        </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
  </div>


<form action="" method="post">
  <input type="date" name="" id="">
</form>


  <!-- currently working -->















  <!-- <button class="btn btn-primary "</button> -->
  <!-- <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    Second default radio
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
  <label class="form-check-label" for="exampleRadios3">
    Disabled radio
  </label>
</div> -->





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
</body>

</html>