<?php
include("connect.php");

function alert_function($alertMessage)
{
    echo "<script>alert('$alertMessage');</script>";
}

function checkData($db,$campusName,$campusAddress)
{
    $sql = "SELECT * FROM campuses WHERE campus_name = '$campusName'";
    $result = mysqli_query($db, $sql);
    $campusExist = mysqli_fetch_assoc($result);

    if ($campusExist) {
        alert_function("Campus is already in the database.");
    } else {
        insertData($db,$campusName,$campusAddress);
    }
}

function insertData($db,$campusName,$campusAddress){
    $sql = "INSERT INTO campuses(campus_name, campus_address) VALUES ('$campusName','$campusAddress')";
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

        checkData($db,$campusName,$campusAddress);
    }
    
}


































$deptName = $deptCampus = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', "", 'onecvsu');
if (isset($_POST['addDepartment'])) {

    $deptName = mysqli_real_escape_string($db, $_POST['deptName']);
    $deptCampus = mysqli_real_escape_string($db, $_POST['deptCampus']);



    if (empty($deptName) || empty($deptCampus)) {
        array_push($errors, "Error: Fill in the empty fields");
    }


    $checkDB = "SELECT * FROM departments WHERE department_name = '$deptName' LIMIT 1";

    $result = mysqli_query($db, $checkDB);
    $deptExist = mysqli_fetch_assoc($result);


    if ($deptExist) {
        echo "tite";
        // array_push($errors, "Department is already in the database");
    } else {
        if (count($errors) == 0) {
            $insertData = "INSERT INTO departments(department_name,campus) VALUES ('$deptName','$deptCampus')";
            mysqli_query($db, $insertData);
            header("managesections.php");
        } else {
            echo "Something went wrong";
            // array_push($errors, "Something went wrong");

        }
    }
}

function displayDB()
{
    $checkDB = "SELECT * FROM departments";
    include("connect.php");
    $result = mysqli_query($db, $checkDB);

    echo "<table border=1>"; // start a table tag in the HTML

    while ($row = mysqli_fetch_array($result)) {

        $data_id = $row["id"];
        echo "<tr><td>" .
            htmlspecialchars($row['department_name']) . "</td><td>" .
            htmlspecialchars($row['campus']) . "</td><td>
         <a href='delete.php?id=$data_id'>Delete</a>&nbsp; 
         </td></tr>";
    }

    echo "</table>"; //Close the table in HTML

    mysqli_close($db); //Make sure to close out the database connection
}
