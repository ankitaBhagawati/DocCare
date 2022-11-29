<?php
session_start();
// session_destroy();
//unset cookie
// setcookie('id',$_SESSION['id'],60);
unset($_SESSION["manager_id"]);
header('location:manager-login.php')

 ?>
