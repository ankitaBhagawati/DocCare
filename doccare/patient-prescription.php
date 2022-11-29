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
    <style>


hr {
    color: #0000004f;
    margin-top: 5px;
    margin-bottom: 5px
}

.add td, .add{
    color: #c5c4c4;
    /* text-transform: uppercase; */
    font-size: 12px
}

.content {
    font-size: 14px
}
    </style>
</head>

<body>
<?php 

include'include/header.php';


?>

    <div class="containers mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex flex-row justify-content-center p-2"> <img src="images/logo.jpg" width="60">
                        <div class="d-flex "> 
                            <h4 class=" text-center mt-2">Prescription</h4>
                            <!-- <small>INV-001</small> -->
                         </div>
                    </div>
                    <hr>
                    <div class="table-responsive p-2">
                        <div class="container-fluid">
                    <div class="row">
                        <?php 
                         $doc_id=$_GET['docid'];
                         $booking_id=$_GET['Id'];
                                    
                         $q = "SELECT  `doctor-registration`.*, `clinic`.*
                         FROM `doctor-registration`
                       
                       RIGHT JOIN `clinic` ON `doctor-registration`.`doc_id` = `clinic`.`doc_id`
                      
                       where  `clinic`.`doc_id`='$doc_id' ";
                    

                         $query = mysqli_query($conn,$q);
                         $res = mysqli_fetch_array($query);
                        //  for specialization
                         $spec_id=$res['spec_id'];
                         $q2="SELECT * FROM `doc_specialist` WHERE `spec_id`='$spec_id'";
                         $query2 = mysqli_query($conn,$q2);
                         $res2 = mysqli_fetch_array($query2);



                         $q3 = "SELECT  `booking`.*,`useraccount`.*
                         FROM `booking`
                       
                       RIGHT JOIN `useraccount`ON `booking`.`user_id` = `useraccount`.`user_id`
                      
                       where `booking`.`booking_id`='$booking_id' ";
                     // $q ="select * from `booking` ";

                         $query3 = mysqli_query($conn,$q3);
                         $res3 = mysqli_fetch_array($query3);
                        ?>
    <div class="col">
        <p  class="add">Patient's Name:</p>
    <p class="font-weight-bold"><?php echo $res3['firstname']; echo "&nbsp;";echo $res3['lastname'];?></p>
    </div>
    <div class="col">
    <h6 class="font-weight-bold text-primary"><?php echo $res['clinicname'];?> </h6>
    <p><?php echo $res['caddress'];?>,<?php echo $res['city'];?>

    </p>

  
    <h6 class="font-weight-bold text-dark"><?php echo $res['saluation'];echo "&nbsp;"; echo $res['fname'];echo "&nbsp;";echo $res['lname'];?> </h6>
    <p>Reg. No:<b><?php echo $res['regnumber'];?></b><br>
    <?php echo $res2['specialization'];?>
</p>
    </div>
    
  </div></div>
                     
                    </div>
                    <hr>
                    <i class="fas fa-prescription text-black-50 fs-3 mx-2"></i>
                    <div class="products p-2">

   


<?php
include 'conne.php'; 
$query="select * from prescription where `booking_id`='$booking_id' ";
$result=mysqli_query($conn,$query);
?>
                       
                            <table id="myTable" class="table  table-striped">
                                <!-- <tr class="add fs-1">
                                    <td class="fs-6 text-center">Medicine name</td>
                                    <td class="fs-6 text-center">Dosage</td>
                                    <td class="fs-6 text-center">when to take</td>
                                   

                                </tr> -->
                                <tr class="add ">

    <th>Medicine</th>
    <th>Dosage</th>
    <th>When to take</th>
    <th>Before/After</th>

  </tr>
                                <tr class="content">
                                <?php
             while($rows=mysqli_fetch_assoc($result))
            {
              ?>
    
    <td> <?php echo $rows['medicine_name']; ?></td>
    <td> <?php echo $rows['dosage']; ?></td>
    <td> <?php echo $rows['time_for_medicine']; ?></td>
    <td> <?php echo $rows['duration']; ?></td>
    
  </tr>
  <?php

}
?>
                                </tr>
                                


                                


                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


    </table>
</body>

</html>
