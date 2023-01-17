<?php
include('functions.php');
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

<form action="functions.php" method="post">
<?php

include('errors.php');
?>
        <label for="">Department</label>
        <input type="text" placeholder="" name="deptName">  

        <label for="">Campus</label>
        <input type="text" name="deptCampus"placeholder="">
        <button type="submit" name="addDepartment">Add Course/Subject</button>


    </form>

    <h1>Manage Departments</h1>
<?php
displayDB();

?>

    <script src="" async defer></script>
</body>

</html>
