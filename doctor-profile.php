<?php 

session_start();
     include 'conne.php';
     
    // if(!isset($_SESSION['fname'])){
    //     header('location:doctor-login.php');
    //     }

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"
        type="text/css">
    <title>Doctor Profile</title>
    <style>
        .show {

            width: 100%;


        }

        .scrollable-menu {
            height: auto;
            max-height: 20S0px;
            overflow-x: hidden;
        }
    </style>

</head>

<body>
    <?php 

// for profile
if(isset($_POST['save1']))
{
    $doc_id=$_COOKIE['doc_id'];
    $saluation = $_POST['saluation'];
    $spec_id = $_POST['spec_id'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        

				
         
         $query=" UPDATE `doctor-registration` SET `doc_id`='$doc_id',`saluation`='$saluation',`spec_id`='$spec_id',`city`='$city',`state`='$state' WHERE `doc_id`='$doc_id'";
         
         $insquery=mysqli_query($conn,$query);
       if($insquery>0){
         header('location:doctor-profile.php');
         $_SESSION["msg"]="Personal Profile submitted Successfully";
        }else{
            header('location:doctor-profile.php');
         $_SESSION["msg"]="unexpected error occured";
        }
            }
        
}
// for Medical
if(isset($_POST['save2']))
{
    $doc_id=$_COOKIE['doc_id'];
    $regnumber = $_POST['regnumber'];
    $council = $_POST['council'];
    $year = $_POST['year'];
    $experience = $_POST['experience'];
    $about = $_POST['about'];

    $docregpic = $_FILES['docregpic'];
    
    $filename = $docregpic['name'];
    $filepath = $docregpic['tmp_name'];
    $fileerror = $docregpic['error'];
    $destfile ='doctor/'.$filename;
    move_uploaded_file($filepath, $destfile);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      

				
         
         $query2=" UPDATE `doctor-registration` SET `doc_id`='$doc_id',`regnumber`='$regnumber',`council`='$council',`year`='$year',`experience`='$experience',`about`='$about',`docregpic`='$destfile' WHERE `doc_id`='$doc_id'";
         print_r( $query2);
         $insquery2=mysqli_query($conn,$query2);
       if($insquery2>0){
         header('location:doctor-profile.php');
         $_SESSION["msg"]="Medical Records submitted Successfully";
        }else{
            header('location:doctor-profile.php');
         $_SESSION["msg"]="unexpected error occured";
        }
            }
        
}
// for clinic Details
if(isset($_POST['save3']))
{
    $doc_id=$_COOKIE['doc_id'];
    $clinicname = $_POST['clinicname'];
    $caddress = $_POST['caddress'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    

    $estproof = $_FILES['estproof'];
    
    $filename = $estproof['name'];
    $filepath = $estproof['tmp_name'];
    $fileerror = $estproof['error'];
    $destfile1 ='clinic/'.$filename;
    move_uploaded_file($filepath, $destfile1);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      

				
         
         $query3="INSERT INTO `clinic`( `doc_id`, `clinicname`, `caddress`, `city`, `phone`, `estproof`) VALUES ('$doc_id','$clinicname','$caddress','$city','$phone','$destfile1')";
         
         $insquery3=mysqli_query($conn,$query3);
       if($insquery3>0){
         header('location:doctor-index.php');
         $_SESSION["msg"]="Clinic Details submitted Successfully";
        }else{
            header('location:doctor-profile.php');
         $_SESSION["msg"]="unexpected error occured";
        }
            }
        
}



?>


    <?php
    
  
    if(isset($_SESSION['msg'])){
      
      $error= $_SESSION['msg']; 
      echo "
      <div class='alert alert-primary alert-dismissible fade show mx-auto w-50' role='alert'>
      $error
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
     
         unset($_SESSION['msg']); 

         }
  ?>









    <div class="d-flex mt-5 header-top justify-content-center flex-row bd-highlight ">

        <div class="form-border border rounded-3 p-3 border-muted col-lg-5 shadow">

            <a href="doctor-index.php">
                <i class="fas fa-arrow-left d-flex justify-content-start fs-4 text-black-50"></i></a>
            <div class="fs-2 col-lg-12 text-dark text-center">
                Build your profile
            </div>
<!-- for personal details -->
            <?php
            $doc_id=$_COOKIE['doc_id'];
$q2 = "SELECT * FROM `doctor-registration`  WHERE saluation= '' and doc_id='$doc_id' ";

  $query2 = mysqli_query($conn,$q2);
  
 
 $res2 = mysqli_num_rows($query2);
$arrdata = mysqli_fetch_array($query2);

if($res2>0){
  ?>
 <h5 class="modal-title">Personal details</h5>
            <p>Enter details like saluation, specialization,gender,location,etc.</p>
            <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop1" >
                Enter Details
            </button>

<?php
}
else{
 ?>

<h5 class="modal-title text-muted">Personal details</h5>
            <p class="text-muted">Enter details like saluation, specialization,gender,location,etc.</p>

            <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop1" disabled >
                Enter Details
            </button>



<?php

}

   ?>

<!-- for Medical Records -->
<?php
            $doc_id=$_COOKIE['doc_id'];
$q3 = "SELECT * FROM `doctor-registration`  WHERE regnumber= '' and doc_id='$doc_id' ";

  $query3 = mysqli_query($conn,$q3);
  
 
 $res3 = mysqli_num_rows($query3);
$arrdata = mysqli_fetch_array($query3);

if($res3>0){
  ?>
<h5 class="modal-title">Medical Record Details</h5>
            <p>Enter details like medical registration number, registration council,experience,etc.</p>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                Enter details
            </button>
<?php
}
else{
 ?>
<h5 class="modal-title text-muted">Medical Record Details</h5>
            <p class="text-muted">Enter details like medical registration number, registration council,experience,etc.</p>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" disabled>
                Enter details
            </button>


<?php

}

   ?>


<!-- for clinic details -->
<h5 class="modal-title">Clinic Details</h5>
            <p>Enter details like clinic name,adress,phone number,etc.</p>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                Enter Details
            </button>





            <!-- personal details Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Personal details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Saluation</label>
                                    <small class="form-text text-muted">Dr./Mr./Mrs.</small>
                                    <select name="saluation" class="form-select form-select"
                                        aria-label=".form-select-sm example">
                                        <option selected> Select Saluation</option>
                                        <option value="Dr">Dr.</option>
                                        <option value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Specialization</label>
                                    <select name="spec_id" class="form-select form-select scrollable-menu" aria-label="
                                        .form-select-sm example">
                                        <option selected>Open this select menu</option>
                                        <?php
								include 'conne.php';
								$q = "select spec_id,specialization from doc_specialist ORDER BY specialization ASC";
								// DISTINCT lagane se hota ha but section display nhi hota
								$result = mysqli_query($conn,$q);
								while ($rows = mysqli_fetch_array($result)) {
								?>
                                        <option value="<?php echo $rows['spec_id']; ?>" id="cid" name="specialization">
                                            <?php echo $rows['specialization']; ?> </option>
                                        <?php
								}
								?>
                                    </select> </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">City</label>

                                    <input type="text" name="city" class="form-control" id="saluation">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">State</label>

                                    <input type="text" class="form-control" id="saluation" name="state">
                                </div>







                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <input class="btn btn-primary" type="submit" value="Submit" name="save1" class="btn">
                            </form>
                        </div>
                    </div>
                </div>



            </div>

            <!-- medical details Modal -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Medical Registration Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post" enctype="multipart/form-data" >
                                <div class="mb-3">
                                    <label class="col-form-label">Registration Number</label>

                                    <input type="text" class="form-control" id="saluation" name="regnumber">
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Registration Council</label>

                                    <select class="form-select form-select" aria-label=".form-select-sm example"
                                        name="council">
                                        <option selected> Select Council</option>
                                        <option value="Tamil Nadu Medical Council">Tamil Nadu Medical Council</option>
                                        <option value="Maharashtra Medical Council">Maharastra Medical Council</option>
                                        <option value="Andhra Pradesh Medical Council">Andhra Pradesh Medical Council
                                        </option>
                                        <option value="Karnataka Dental Council"> Karnataka Dental Council</option>
                                        <option value="Maharashtra Council of Indian Medical"> Maharashtra Council of
                                            Indian
                                            Medical</option>
                                        <option value="Delhi State Dental Council">Delhi State Dental Council</option>
                                        <option value="Medical Council of India">Medical Council of India</option>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Year of Registration</label>

                                    <?php

                                $currently_selected = date('Y');  
                                     $earliest_year = 1950;   
                                 $latest_year = date('Y'); 
                                 print '<select class="form-select form-select scrollable-menu" aria-label="
                                 .form-select-sm example" name="year">';
                             foreach ( range( $latest_year, $earliest_year ) as $i ) {    
                               print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                    }
                                      print '</select>';
                                 ?>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Doctor Registration proof</label>
                                    <input class="form-control" type="file" id="formFile" name="docregpic">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Experience</label>

                                    <input type="number" class="form-control" name="experience">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">About Yourself </label>
                                    <small class="form-text text-muted">Describe your experience,career
                                        details,etc.</small>
                                    <textarea type="text" class="form-control" cols="30" rows="3" name="about"></textarea>

                                </div>
                                </div>
                                  <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" value="Submit" name="save2" class="btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clinic details Modal -->
            <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Clinic Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="col-form-label">Clinic Name</label>

                                    <input type="text" class="form-control" name="clinicname">
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Clinic Address</label>

                                    <input type="text" class="form-control" name="caddress">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Clinic city</label>

                                    <input type="text" class="form-control" name="city">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Clinic phone No.</label>

                                    <input type="text" class="form-control"name="phone">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Establishment Proof</label>

                                    <input class="form-control" type="file" id="formFile" name="estproof">
                                        
                                </div>

                            



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Submit" name="save3" class="btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>

</html>