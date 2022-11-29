<?php
session_start();
// session_destroy();
//unset cookie

if(isset($_SESSION['user_id'])){
    unset($_SESSION["user_id"]);
    header('location:patient-login.php');
}else{
    
    setcookie('id',$_SESSION['id'],60);
unset($_SESSION["email"]);
unset($_SESSION["role"]);
unset($_SESSION["fname"]);
header('location:admin-login.php');

}
 ?>
