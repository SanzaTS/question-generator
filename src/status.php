

<?php
include("session.php");
include("connection.php");

$email = $_GET['id'];


//$time = date("h:i:s");

$upd = "UPDATE users SET `last_activity` = 'Offline' WHERE email ='$email'";
$res = mysqli_query($con,$upd);

if($res)
{
    
    
    header("location:adminRep.php");
}





?>