<?php

include("../connect.php");
include("includes/inc.departments.php");


$campusID = $_REQUEST["id"];

$campusLoc = $db_campusName;


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>

<a href="campuses.php">-back</a>


    <h1>Manage <?php echo $campusLoc ?> Campus</h1>


    <?php

    // echo $campusID . " Campus <br>";
writeOut($testVar);
    showDepartments($db, $campusID);


    ?>

<button onclick="addDepartmentEnabled()" id="addProgram-btn">Add Department</button>

<div style="display: none;" id="addProgram-div">
        <form action="includes/inc.departments.php" method="post">
            <label for="">College Name:</label>
            <input type="text" name="department" required>
            <button type="submit" name="addDepartment">Add Department</button>
        </form>
    </div>

</body>


<script>
    var div = document.getElementById("addProgram-div")
    var btn = document.getElementById("addProgram-btn")
    function addDepartmentEnabled(){
        div.style.display = 'block';
        btn.style.display = 'none';
    }


</script>

</html>