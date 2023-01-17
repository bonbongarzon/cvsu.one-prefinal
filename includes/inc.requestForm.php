<?php

include('connect.php');




function returnCourse($course){

    if($course == "BED"){
        $program = "Bachelor of Elementary Education";
        return $program;
    } else if ($course == "BsED"){
        $program = "Bachelor of Secondary Education";
        return $program;
    }else if ($course == "BSBM"){
        $program = "BS Business Management";
        return $program;
    }else if ($course == "BSCS"){
        $program = "BS Computer Science";
        return $program;
    }else if ($course == "BSHM"){
        $program = "BS Hospitality Management";
        return $program;
    }else if ($course == "BSIT"){
        $program = "BS Information Technology";
        return $program;
    }else if ($course == "BSPsy"){
        $program = "BS Psychology";
        return $program;
    }else if ($course == "BSTM"){
        $program = "BS Tourism Management";
        return $program;
    }else{
        $program = "Laboratory / Science High School";
        return $program;
    }
    

}


$user = $_SESSION['student_exist'];
$sql = "SELECT * FROM student_info WHERE studentNumber = '$user'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if ($row > 0) {

    $id = $row['id'];
    $studentNumber = $row['studentNumber'];
    $firstName = $row['firstName'];
    $middleName = $row['middleName'];
    $lastName = $row['lastName'];
    $suffix = $row['suffix'];
    $email = $row['email'];
    $course = $row['enrolledProgram'];
    returnCourse($course);
    
       

}

