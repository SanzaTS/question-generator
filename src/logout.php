<?php

include("session.php");
include("connection.php");


$email = $_SESSION['email'];


$time = date("h:i:s");

$upd = "UPDATE users SET `last_activity` = 'Offline' WHERE email ='$email'";
$res = mysqli_query($con,$upd);

if($res)
{
    session_unset();

    session_destroy();
    
    header("location:index.php");
}




?>