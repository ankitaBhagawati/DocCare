
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
 
     <title> Find Doctor </title>
</head>
    <body>
    <?php
include 'conne.php'; 
$query="select * from doc_specialist";
$result=mysqli_query($conn,$query);
$post['message']="Book Now";
if(isset($_POST['submit'])){
	$str=mysqli_real_escape_string($conn,$_POST['str']);
	// $sql="select * from `doctor-registration` where `fname`	LIKE '%$str%' ";
    $sql=" SELECT  `doctor-registration`.*, `doc_specialist`.`specialization`, `doc_specialist`.`spec_id`,`clinic`.*
                                  FROM `doctor-registration`
                                RIGHT JOIN `doc_specialist` ON `doctor-registration`.`spec_id` = `doc_specialist`.`spec_id`
                                RIGHT JOIN `clinic` ON `doctor-registration`.`doc_id` = `clinic`.`doc_id`
                                where 
                                -- `verification_status`='1' and ban_status='0' and 	del_status='0' or
                                 `fname`	LIKE '%$str%' or `clinic`.`pincode`  LIKE '%$str%'";
   
	$row=mysqli_query($conn,$sql);
    
	if(mysqli_num_rows($row)>0){
		while($res=mysqli_fetch_assoc($row)){
           ?>
                      <div class="col-lg-8 mb-3">
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
	}else{
		echo "No data found";
	}
}



?>
    <form method="post" action="">
	<input type="textbox" name="str" required/>
	<input type="submit" name="submit" value="Search"/>
</form>
    <section class="about" id="about">
<h1 class="heading"><span></span> Find Doctors<span></span></h1>

<div class="row"  style= "justify-content: center;  gap: 80px; padding-left: 30px; padding-right: 30px;">
<?php
    while($rows=mysqli_fetch_assoc($result))
            {
              ?>
              
<div class="card" style="width: 18rem;" data-aos="zoom-in">
<img src="/doccare/images/logo.jpg" class="card-img-top" alt="...">

        <div class="box-container">
                    <h3> <?php echo $rows['specialization'];?></h3>
                    <a href="filter_doctor.php?spec_id=<?php echo $rows['spec_id'];?>"><button class="button">Find Doctors</button></a>
                </div>
            </div>
            <?php
}
?>


        </div>
        
    </div>
    
</section>
</body>
</html>