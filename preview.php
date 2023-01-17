<?php

include_once('includes/functions.php');
include_once('includes/inc.login.php');
include_once('includes/inc.requestForm.php');


if (!isset($_SESSION['student_exist'])) {
    header('Location: loginpage.php');
} else {
    $id = $row['id'];
    consoleLogs($_SESSION['student_exist']);
    $user = $_SESSION['student_exist'];
}

if(isset($_SESSION['kimmy'])){

}

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reqForm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</head>


<?php include('php/reqDoc-nav.php') ?>

<section class="content">
    <div class="left-panel">
        <ul>
            <li>Student No.: &nbsp <?php echo $id . "-" . $user ?></li>
            <li><a href="reqForm.php">Request Docs</a></li>
            <li><a href="#">Edit Profile</a></li>
            <li><a href="includes/logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="right-panel">
        <div class="right-panel-cta">
            <h3>Take a look on the Preview</h3>
            <p>Verify the information before downloading the file.</p>
        </div>
        <div class="pdf-panel">
            <?php $data = $_SESSION['kimmy'];
            echo "<iframe src='data:application/pdf;base64,$data'></iframe>" ?>
        </div>
    </div>

</section>

<?php
include('footer.php');
?>