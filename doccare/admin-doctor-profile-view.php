<?php 

session_start();
//      include 'conne.php';
     
//     if(!isset($_COOKIE['id']) ){
//         header('location:admin-login.php');
//         }
//         if(!isset($_SESSION['email']) ){
// $_SESSION['email']=$_COOKIE['id'];


//         }
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
<!--     
    <style>
        .show {

            width: 100%;


        }
    </style> -->
    <title>Doctor</title>
</head>

<body>
    <?php 
     if(isset($_COOKIE['id']) ){
        include'include/header.php';
               }else{
                include'include/header.php';
               }
    



     ?>
    <div class="content" style="
    margin-left: 80px;
">



    </div>

    <!-- <div class="container"> -->
        <div class="main-body">
                 <!-- #### view for Doctor Profile if he visits from his id###0# -->
                 <?php 
                 
                 if(isset($_COOKIE['doc_id'])){
                 ?>
                 <?php 
                    include 'conne.php';
                    if(isset($_COOKIE['doc_id'])){


                        $Id = mysqli_real_escape_string($conn, $_COOKIE['doc_id']);
                        $q = "SELECT * FROM `doctor-registration`  WHERE doc_id= $Id";
 
  
                     $query = mysqli_query($conn,$q);

                        $res = mysqli_fetch_assoc($query);

  
                     $q2=" SELECT  `doctor-registration`.`spec_id`,`doctor-registration`.`doc_id`, `doc_specialist`.`specialization`, `doc_specialist`.`spec_id`
                        FROM `doctor-registration`
                    RIGHT JOIN `doc_specialist` ON `doctor-registration`.`spec_id` = `doc_specialist`.`spec_id`
                    WHERE `doctor-registration`.`doc_id`=$Id";
  
  
                    $query2 = mysqli_query($conn,$q2);
                 $res2 = mysqli_fetch_assoc($query2);

                    }
                    ?>
            <div class="row gutters-sm  ml-5">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <?php 
                                
                                $data=$res['docregpic'];;
                                $abc =substr($data,strpos($data,"/")+1);
                                if($abc!=""){
                                    ?>
                                <img src="<?php echo htmlspecialchars($res['docregpic']); ?>" alt="Admin"
                                    class="rounded-circle" width="150">
                                <?php
                                }else{
                                    ?>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <?php
                                }
                                
                                
                                
                                
                                ?>





                                <div class="mt-3">
                                    <h4><?php echo $res['saluation'];echo".";echo "&nbsp;"; echo htmlspecialchars($res['fname']); echo "&nbsp;";echo $res['lname'];?>
                                    </h4>
                                    <p class="text-secondary mb-1">
                                        <?php echo $res2['specialization'];?>
                                    </p>
                                    <p class="text-muted font-size-sm"><?php echo $res['email'];?></p>
                                    <p class="text-secondary mb-1">
                                        <?php echo $res['about'];?>
                                    </p>
                                    <!-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-7">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Personal Details</h5>

                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-3 ">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['saluation'];echo".";echo "&nbsp;"; echo htmlspecialchars($res['fname']); echo "&nbsp;";echo $res['lname'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['email'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['phone'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
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
                            </div>


                        </div>
                    </div>
                         <?php 
                          if(isset( $_COOKIE['doc_id']) ){
      
                         ?>





                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Medical Record Details</h5>

                            </div>
                            <div class="row  mt-2">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Medical reg. No.</h6>
                                </div>
                                <div class="col-sm-5 text-secondary">
                                    <?php echo $res['regnumber'];?>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Registration Council</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['council'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Year of Registration</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['year'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Experience</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['experience'];?> Years
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Doc registration proof</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <a href="<?php echo $res['docregpic']; ?>"
                                        onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Registration
                                        Proof</a>

                                </div>
                            </div>


                        </div>
                    </div>


                    <?php 
                        }
                        ?>
                    <!-- Clinical details section -->

                    <?php 
                        include 'conne.php';
                    if(isset( $_COOKIE['doc_id'])){

                          $Id = mysqli_real_escape_string($conn,  $_COOKIE['doc_id']);
                        
                     $q3=" SELECT  `doctor-registration`.`doc_id`, `clinic`.`doc_id`, `clinic`.`clinicname`,`clinic`.`caddress`,`clinic`.`city`,`clinic`.`phone`,`clinic`.`pincode`,`clinic`.`estproof`
                          FROM `doctor-registration`
                            RIGHT JOIN `clinic` ON `doctor-registration`.`doc_id` = `clinic`.`doc_id`
                        WHERE `clinic`.`doc_id`=$Id";
  

                     $query3 = mysqli_query($conn,$q3);
                          $res3 = mysqli_fetch_assoc($query3);
  

                        }

                            ?>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Clinical Details</h5>

                            </div>
                            <div class="row  mt-2">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['clinicname'];?>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Adress</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['caddress'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['city'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Pincode</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['pincode'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Contact No.</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['phone'];?>
                                </div>
                            </div>

                            <?php 
                             if(isset($_COOKIE['id']) ){
      
                                  ?>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic registration proof</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <a href="<?php echo $res['estproof']; ?>"
                                        onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Establishment
                                        Proof</a>

                                </div>
                            </div>
                            <?php 

                                }
                                ?>

                        </div>
                    </div>



                </div>

            </div>
            <?php 
                 }else{
            ?>
              <!-- #### view for admin if he visits from his id###0# -->
                         <?php 
                    include 'conne.php';
                    if(isset($_GET['Id'])){


                        $Id = mysqli_real_escape_string($conn, $_GET['Id']);
                        $q = "SELECT * FROM `doctor-registration`  WHERE doc_id= $Id";
 
  
                     $query = mysqli_query($conn,$q);

                        $res = mysqli_fetch_assoc($query);

  
                     $q2=" SELECT  `doctor-registration`.`spec_id`,`doctor-registration`.`doc_id`, `doc_specialist`.`specialization`, `doc_specialist`.`spec_id`
                        FROM `doctor-registration`
                    RIGHT JOIN `doc_specialist` ON `doctor-registration`.`spec_id` = `doc_specialist`.`spec_id`
                    WHERE `doctor-registration`.`doc_id`=$Id";
  
  
                    $query2 = mysqli_query($conn,$q2);
                 $res2 = mysqli_fetch_assoc($query2);

                    }
                    ?>
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <?php 
                                
                                $data=$res['docregpic'];;
                                $abc =substr($data,strpos($data,"/")+1);
                                if($abc!=""){
                                    ?>
                                <img src="<?php echo htmlspecialchars($res['docregpic']); ?>" alt="Admin"
                                    class="rounded-circle" width="150">
                                <?php
                                }else{
                                    ?>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <?php
                                }
                                
                                
                                
                                
                                ?>





                                <div class="mt-3">
                                    <h4><?php echo $res['saluation'];echo".";echo "&nbsp;"; echo htmlspecialchars($res['fname']); echo "&nbsp;";echo $res['lname'];?>
                                    </h4>
                                    <p class="text-secondary mb-1">
                                        <?php echo $res2['specialization'];?>
                                    </p>
                                    <p class="text-muted font-size-sm"><?php echo $res['email'];?></p>
                                    <p class="text-secondary mb-1">
                                        <?php echo $res['about'];?>
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
                            <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Personal Details</h5>

                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-3 ">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['saluation'];echo".";echo "&nbsp;"; echo htmlspecialchars($res['fname']); echo "&nbsp;";echo $res['lname'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['email'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['phone'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
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
                            </div>


                        </div>
                    </div>
                         <?php 
                          if(isset($_COOKIE['id']) ){
      
                         ?>





                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Medical Record Details</h5>

                            </div>
                            <div class="row  mt-2">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Medical reg. No.</h6>
                                </div>
                                <div class="col-sm-5 text-secondary">
                                    <?php echo $res['regnumber'];?>
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    <a href="https://www.nmc.org.in/information-desk/indian-medical-register/"
                                        target="_blank">Verify record at Indian Medical Record</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Registration Council</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['council'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Year of Registration</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['year'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Experience</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res['experience'];?> Years
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Doc registration proof</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <a href="<?php echo $res['docregpic']; ?>"
                                        onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Registration
                                        Proof</a>

                                </div>
                            </div>


                        </div>
                    </div>


                    <?php 
                        }
                        ?>
                    <!-- Clinical details section -->

                    <?php 
                        include 'conne.php';
                    if(isset($_GET['Id'])){

                          $Id = mysqli_real_escape_string($conn, $_GET['Id']);
                        
                     $q3=" SELECT  `doctor-registration`.`doc_id`, `clinic`.`doc_id`, `clinic`.`clinicname`,`clinic`.`caddress`,`clinic`.`city`,`clinic`.`phone`,`clinic`.`pincode`,`clinic`.`estproof`
                          FROM `doctor-registration`
                            RIGHT JOIN `clinic` ON `doctor-registration`.`doc_id` = `clinic`.`doc_id`
                        WHERE `clinic`.`doc_id`=$Id";
  

                     $query3 = mysqli_query($conn,$q3);
                          $res3 = mysqli_fetch_assoc($query3);
  

                        }

                            ?>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="modal-header bg-dark text-white ">
                                <h5 class="modal-title text-center">Clinical Details</h5>

                            </div>
                            <div class="row  mt-2">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['clinicname'];?>
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Adress</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['caddress'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['city'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Pincode</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['pincode'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic Contact No.</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $res3['phone'];?>
                                </div>
                            </div>

                            <?php 
                             if(isset($_COOKIE['id']) ){
      
                                  ?>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Clinic registration proof</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <a href="<?php echo $res['estproof']; ?>"
                                        onclick="window.open(this.href, '_blank', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">Establishment
                                        Proof</a>

                                </div>
                            </div>
                            <?php 

                                }
                                ?>

                        </div>
                    </div>



                </div>

            </div>
            <?php }?>
        
                            </div>
</body>

</html>