<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="doccare";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

//Check connection validity
if (!$conn) 
{
    die ("Could not connect to the database host: ". mysqli_connect_error());
}
         
//Set the character set of the connection
if(!mysqli_set_charset ( $conn , 'UTF8' ))
{
    die('mysqli_set_charset() failed');
}
?>
