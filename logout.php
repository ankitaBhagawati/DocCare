<?php
session_start();
// session_destroy();
//unset cookie
setcookie('email',$_SESSION['email'],60);
unset($_SESSION["email"]);
header('location:doctor-login.php')

 ?>
