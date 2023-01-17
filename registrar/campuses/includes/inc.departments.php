<?php
include("../connect.php");
include("mainfunctions.php");
session_start();



function trying($testVar){

    $sql = "impurities";

    $testVar = $sql;

    return $testVar;


}

function retrieveIdData($db,$db_campusName){
    $campus_id = $_REQUEST['id'];



    $sql = "SELECT * FROM campuses WHERE id = '$campus_id' limit 1";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $db_campusName = $row['campus_name'];

    return $db_campusName;


}


function writeOut($testVar){
    trying($testVar);
    echo $testVar;
}

function showDepartments($db, $db_campusName,$testVar)
{
    echo $testVar;

    
    $sql = "SELECT * FROM departments WHERE campus = '$db_campusName'" ;
    $result = mysqli_query($db, $sql);

    echo "<table>";




    while ($row = mysqli_fetch_assoc($result)) {

        $deptID = $row['id'];

         $_SESSION['deptID'] = $deptID ;
        $deptName = $row['department_name'];
        echo $deptID;
        echo "<tr><td> <a href='programs.php?id=$deptName'>" .
            htmlspecialchars($row['department_name']) . "</td><td>
         <a href='../programs.php?id=$deptID>'>Update</a>&nbsp; 
         </td></tr>";
    }

    echo "</table>";
}




function checkDepartment($db){

    $campusID = $_SESSION["campus_id"];
    $departmentName = $_POST['department'];

    $sql = "SELECT * from departments WHERE department_name = '$departmentName' AND campus = '$campusID' LIMIT 1";

    $result = mysqli_query($db, $sql);

    if ($row = mysqli_fetch_assoc($result) > 1){
        alert_function("Sorry! The entry is already in the database.");

        echo"<script>window.location.href='../departments.php?id=$campusID'</script>";
    
    } else{
        insertDepartment($db);
    }
}


function insertDepartment($db){

    $campusID = $_SESSION["campus_id"];
    $departmentName = $_POST['department'];

    mysqli_query($db, "INSERT INTO departments (department_name,campus) VALUES ('$departmentName','$campusID') LIMIT 1");
    alert_function("College/Department Added Successfully");
    echo "<script>window.location.href='../departments.php?id=$campusID'</script>";


}


if (isset($_POST['addDepartment'])) {
   checkDepartment($db);
    }