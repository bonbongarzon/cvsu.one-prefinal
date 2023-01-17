<?php
use Vtiful\Kernel\Format;
include("../connect.php");



$campusName = $campusAddress = $campusStatus = "";
function alert_function($alertMessage)
{
    echo "<script>alert('$alertMessage');</script>";
}

function checkData($db, $campusName, $campusAddress, $campusStatus)
{
    $sql = "SELECT * FROM campuses WHERE campus_name = '$campusName'";
    $result = mysqli_query($db, $sql);
    $campusExist = mysqli_fetch_assoc($result);

    if ($campusExist) {
        alert_function("Campus is already in the database.");
    } else {
        insertData($db, $campusName, $campusAddress, $campusStatus);
    }
}

function insertData($db, $campusName, $campusAddress, $campusStatus)
{
    $sql = "INSERT INTO campuses(campus_name, campus_address,campus_status) VALUES ('$campusName','$campusAddress','$campusStatus')";
    mysqli_query($db, $sql);
    alert_function("Campus Added Successfully");
}






if (isset($_POST['addCampus'])) {

   
    $campusName = $_POST['campusName'];
    $campusAddress = $_POST['campusAddress'];


    if (empty($_POST['campusName']) || empty($_POST['campusAddress'])) {
        alert_function("Fill in the required fields");
    } else {
        $campusName = $_POST['campusName'];
        $campusAddress = $_POST['campusAddress'];
        $campusStatus = "Active";

        checkData($db, $campusName, $campusAddress, $campusStatus);
    }
}






function showDepartments($db, $db_campusName)
{
    $sql = "SELECT * FROM departments WHERE campus = '$db_campusName'" ;
    $result = mysqli_query($db, $sql);

    echo "<table>";




    while ($row = mysqli_fetch_assoc($result)) {




        echo "<tr>";
        echo "<td> ". ($row['department_name']) ."</td>";
        
        
        
        
        echo"</tr>";
    }

    echo "</table>";
}


if (isset($_POST['addProgram'])) {

$programName = $_POST['program'];
echo $programName . $campusID;
    // $sql = mysqli_query($db, "INSERT INTO programs () VALUES ('$name','')");
    




}