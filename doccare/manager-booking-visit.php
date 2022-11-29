
<?php
include 'conne.php';




if(isset($_GET['Id'])){
	$Id = $_GET['Id'];

$q = "update `booking` set booking_id='$Id', status='3' WHERE booking_id='$Id'";

mysqli_query($conn, $q);


}
header('location:manager-appointment-days.php');
 ?>
 