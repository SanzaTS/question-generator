<?php

include("connection.php");
include("session.php");

$id = $_GET['id'];
$subj = $_SESSION['subj'];

mysqli_query($con," DELETE FROM lecture_subject WHERE lecture_id =$id AND subject_code = '$subj'");

header("location:admin.php");




?>