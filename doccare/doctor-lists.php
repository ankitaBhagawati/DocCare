<?php 
 session_start();
ob_start();

if(!isset($_SESSION['user_id']) ){
    header('location:patient-login.php');
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"
        integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
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
    <?php include'include/navbar.php'?>
   
    <div class="mx-5 mt-2 mb-3">


        <div class="row">

            <div class="col-lg-8 col-sm-12 ">


                <div class="row">
                    <?php 
                            
               
                            include 'conne.php';
               
                   
                                 $q2=" SELECT  `doctor-registration`.*, `doc_specialist`.`specialization`, `doc_specialist`.`spec_id`,`clinic`.*
                                  FROM `doctor-registration`
                                RIGHT JOIN `doc_specialist` ON `doctor-registration`.`spec_id` = `doc_specialist`.`spec_id`
                                RIGHT JOIN `clinic` ON `doctor-registration`.`doc_id` = `clinic`.`doc_id`
                                where `verification_status`='1' and ban_status='0' and 	del_status='0'";
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

                                                <input type="text" id="radio-value" name="time" class="time" hidden />
                                            </div>

                                            <input class="btn btn-info text-light mt-2" type="submit" name="save"
                                                value="Book Now" />
                                        </form>



                                        <a href="#"><button class="btn btn-primary text-light mt-2"
                                                onclick="window.location='tel: <?php echo $res['phone']; ?>';"><i
                                                    class="fas fa-phone-alt mx-2"></i><b>Contact
                                                    Clinic</b></button></a>

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
        <!-- </div>
    </div> -->
    <div class="col-lg-3 d-none d-lg-block">
        <div class="card">
            <!-- <img src="https://i.imgur.com/ZSkeqnd.jpg" class="rounded-circle mx-auto" width="100" /> -->
            <div class="card-body">
                <h5 class="card-title">Top doctors</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                    of
                    the card's content.</p>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                    of
                    the card's content.</p>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                    of
                    the card's content.</p>
                    <h5 class="card-title">Top Articles</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>


    </div>

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
            $(this).parent().find('.time').val(val);
        });
    </script>

</body>

</html>