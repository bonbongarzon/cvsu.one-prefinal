<?php

include("includes/connect.php");

$user_id = $_POST["user_id"];

$new_lname = $_POST["new_lname"];
$new_fname = $_POST["new_fname"];
$new_mname= $_POST["new_mname"];
$new_suffix= $_POST["new_suffix"];
$new_program= $_POST["new_program"];

mysqli_query($conn, "UPDATE student_info SET lastName ='$new_lname', firstName='$new_fname', middleName='$new_mname', suffix='$new_suffix' ,enrolledProgram = '$new_program' WHERE id='$user_id'");

echo "<script language='javascript'>alert( 'Record has been updated!')</script>";
echo "<script>window.location.href='profile.php';</script>";


?> 