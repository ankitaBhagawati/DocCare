<?php
require('payment-config.php');
include 'conne.php';

if(isset($_POST['stripeToken'])){
	// to disable ssl
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>5000,
		"currency"=>"inr",
		"description"=>"DocCare",
		"source"=>$token,
	));
	echo"<div class='alert alert-success alert-dismissible fade show mx-auto w-50' role='alert'><i class='fas fa-key'></i>
	Payment successful
	<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	</div>";
	// echo "<pre>";
	// print_r($data);
	$q="INSERT INTO `booking`( `payment`) VALUES ('1')";
	mysqli_query($conn,$q);
}
?>