<?php

include("connect.php");






if(isset($_POST['request'])){

    $documentType = $_POST['documentType'];


    if ($documentType == "COG"){

        include_once("generatePDF.php");
        

    }



}




?>