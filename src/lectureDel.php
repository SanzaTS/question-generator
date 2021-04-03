<?php

 include("connection.php");
 $id = $_GET['id'];

 $sql1 ="DELETE FROM lecture WHERE lecture_id = $id";

 $sql2 = "DELETE FROM lecture_subject WHERE lecture_id = $id";
 
 mysqli_query($con,$sql1) or mysqli_error($con) ;
 mysqli_query($con,$sql2) or mysqli_error($con);
 
    header("location:admin.php");
  
 
 


?>