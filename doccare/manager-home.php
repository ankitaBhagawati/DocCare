<?php 

session_start();
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
    <title>Document</title>
</head>

<body>
    <?php 
    include'include/header.php';
    include 'conne.php';
    ?>
     <div class="content" style="margin-left:80px;">
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-muted">Dashboard</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
            <h2 class="text-center text-dark">Doctors You manage</h2>
       
        <!-- <div class="mx-5"> -->
            <div class="mx-3 mt-2 mb-3 w-100">
                <div class="col-lg-8 col-sm-12 ">


                    <div class="row">

                        <?php 
                        
                        $manager_id=$_SESSION['manager_id'];
                        
                        
                                
                                    
                        $q2=" SELECT  `doctor-registration`.*, `manager-mapping`.*,`clinic`.*, `doc_specialist`.`specialization`, `doc_specialist`.`spec_id`
                        FROM `doctor-registration`
                    RIGHT JOIN `manager-mapping` ON `doctor-registration`.`doc_id` =  `manager-mapping`.`doc_id`
                    RIGHT JOIN `doc_specialist` ON `doctor-registration`.`spec_id` = `doc_specialist`.`spec_id`
                    RIGHT JOIN `clinic` ON `doctor-registration`.`doc_id` = `clinic`.`doc_id`

                    where `manager_id`='$manager_id'";
                        $query2 = mysqli_query($conn,$q2);


    while ( $res = mysqli_fetch_assoc($query2)){
        ?>  
                        <div class="col-lg-12 mb-3">
                            <div class="card mb-2">
                                <div class="row">
                                    <div class="col-lg-2  col-sm-12">
                                        <div class="p-3 ">
                                            <?php 
                                
                                        $data=$res['docregpic'];;
                                         $abc =substr($data,strpos($data,"/")+1);
                                        if($abc!=""){
                                            ?>
                                            <img src="<?php echo htmlspecialchars($res['docregpic']); ?>" alt="Admin"
                                                cclass="rounded-circle img-fluid " width="100">
                                            <a href="admin-doctor-profile-view?Id=<?php echo $res['doc_id']; ?>"
                                                target="_blank" rel="noopener noreferrer"
                                                class="link-primary text-decoration-none"> View Profile</a>
                                            <?php
                                            }else{
                                            ?>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                                class="rounded-circle img-fluid " width="100">
                                            <a href="admin-doctor-profile-view?Id=<?php echo $res['doc_id']; ?>"
                                                target="_blank" rel="noopener noreferrer"
                                                class="link-primary text-decoration-none"> View Profile</a>
                                            <?php
                                            }                                                          
                                
                                
                                            ?>
                                            <!-- 
                                        <img src="<?php echo $res['docregpic']; ?>" class="rounded-circle img-fluid " width="100" /> -->
                                        </div>
                                    </div>

                                    <div class="col-lg-10 ">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">
                                                <?php echo $res['saluation'];echo".";echo "&nbsp;"; echo htmlspecialchars(ucfirst($res['fname'])); echo "&nbsp;";echo $res['lname'];?>
                                            </h5>
                                            <p class="text-muted mb-0">
                                                <?php echo ucwords($res['specialization']);?>
                                            </p>
                                            <p class="text-muted mb-0">
                                                <?php echo $res['experience']; echo" years experience overall";?>

                                            </p>
                                            <p class="text-dark mb-0">
                                                <b>
                                                    <?php echo ucfirst($res['city']) ; echo","; echo ucfirst($res['state']) ;?>
                                                </b> <i class="fas fa-capsules text-primary fs-6"></i>
                                                <?php  echo ucfirst($res['clinicname']) ;?>

                                            </p>
                                            <p class="text-muted mb-0">

                                                <?php 
                                        
                                        if($res['fees']!=0){
                                            echo"&#8377;";echo $res['fees']; echo" consultation fees";    
                                        }
                                        ?>

                                            </p>
                                    <a class="btn btn-primary" href="manager-appointment-scheduling.php?doc_id=<?php echo $res['doc_id'];?>">
                                    Schedule</a>
                                            <?php
                                        // function current_url()
                                        // {
                                        //     $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                        //     $validURL = str_replace("&", "&amp", $url);
                                        //     return $validURL;
                                        // }
                                        // echo "page URL is : ".current_url();

                                        // $offer_url = current_url();

                                        ?>




                                            <!-- 
                                            <form method="post"
                                                onsubmit="window.location = 'doctor-slots-available.php?id=' + time.value +'&doc=' + '<?php  echo $res['doc_id'];?>'; return false;">
                                                <div class="radio-group col-lg-12 ">
                                                    <?php


                                                $id =$res['doc_id'];

                                                $sql =  "SELECT  `doctor-registration`.*, `doctor_availability`.*
                                                FROM `doctor-registration`
                                                RIGHT JOIN `doctor_availability` ON `doctor-registration`.`doc_id` = `doctor_availability`.`doc_id`

                                                where `doctor-registration`.`doc_id`='$id ' and `doctor_availability`.`day_of_week` > date_format(curdate(), '%d/%m/%Y') ";

                                                $query = mysqli_query($conn,$sql);    

                                                while ( $res2 = mysqli_fetch_assoc($query)){
                                                    ?>




                                                    <div class="radio  btn btn-primary mb-3"
                                                        data-value="<?php echo $res2['day_of_week']; ?>">
                                                        <?php echo $res2['day_of_week']; ?>
                                                    </div>



                                                    <?php } ?>

                                                    <input type="text" id="radio-value" name="time" class="time"
                                                        hidden />
                                                </div>

                                                <input class="btn btn-info text-light mt-2" type="submit" name="save"
                                                    value="Book Now" />
                                            </form>



                                            <a href="#"><button class="btn btn-primary text-light mt-2"
                                                    onclick="window.location='tel: <?php echo $res['phone']; ?>';"><i
                                                        class="fas fa-phone-alt mx-2"></i><b>Contact
                                                        Clinic</b></button></a> -->

                                        </div>
                                    </div>





                                </div>
                            </div>



                        </div>
                      
                        <?php 
                   
                }
            ?>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    </div>
</body>

</html>