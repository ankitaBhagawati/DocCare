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
session_start();
include("conne.php");
$id =$_REQUEST['id'];
$dt = $_REQUEST['dateva'];
// $sql = "SELECT * FROM `doctor_availability` where day_of_week='$dt' and `doc_id`='34'";
$sql =  "SELECT  `doctor-registration`.*, `doctor_availability`.*
FROM `doctor-registration`
RIGHT JOIN `doctor_availability` ON `doctor-registration`.`doc_id` = `doctor_availability`.`doc_id`

where `doctor-registration`.`doc_id`='$id ' and `doctor_availability`.`day_of_week`='$dt '";


$result = mysqli_query($conn, $sql) or die("error");

$row1 = mysqli_fetch_assoc($result);

 
                  if($row1>0){
                    
?>                      <div>
                        <p>Slot Available</p>
                        
                    <!-- <input type="text" id="radio-value" name="time" class="time" disabled /> -->
                    <a href="teacher-update.php?id=<?php echo $res['id'];?>"><button class="btn btn-info text-light mt-2" name="update">Update
            </button></a>
                    <a href="abcd.php">
                    <button class="btn btn-info text-light mt-2">
                    Book Appointment
                    </button>
                  
                    </a>                                       
                                           
                   
                  </div>
              <?php   }else{

                echo"no data available";
              }
                ?>
   