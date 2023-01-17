<?php

include ("includes/inc.campuses.php")

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
        <title>Manage Campuses</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

<h1>Manage Campuses</h1>
    <form action="" method="post">
        <label for="">Campus Name</label>
        <input type="text" name="campusName">

        <label for="">Address</label>
        <input type="text" name="campusAddress">

        <button type="submit" name="addCampus">Add Campus</button>
    </form>

    <?php

    showCampuses($db);
    ?>

<a href='editCampus.php?id=$data_id'>Manage</a>&nbsp; 

        
        <script src="" async defer></script>
    </body>
</html>