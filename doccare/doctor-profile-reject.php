


<?php
include 'conne.php';




if(isset($_GET['Id'])){
	$Id = $_GET['Id'];

$q = "update `doctor-registration` set doc_id='$Id', verification_status='0' WHERE doc_id='$Id'";

mysqli_query($conn, $q);


}
header('location:admin-doctor-profile.php');
 ?>
