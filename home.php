<?php

include_once('includes/functions.php');
include_once('includes/inc.login.php');


if (!isset($_SESSION['user_sn'])) {
    header('Location: loginpage.php');
}


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
    <title>New Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</head>

<!-- START OF DOUBLE NAVIGATION -->





<?php
include('navbar.php');
?>



<body>

    <!-- START OF HERO PANEL -->
    <div class="home-hero-main">
        <h3>Cavite State University - Silang Campus</h3>
        <h1>Fill in the form to get your documents!
            <hr>
        </h1>

    </div>

    <?php
    include('reqForm.php');
    ?>
    <!-- <section>
        <form action="index.php" method="POST">
            <label for="Name ">Name: </label>
           
            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name"><br>
            <label for="program">Course</label>
            <input type="text" name="program" placeholder="Program">
            <label for="program">Semester</label>
            <input type="text" name="semester" placeholder="Semester">
            <label for="program">School Year</label>
            <input type="text" name="schoolyear" placeholder="2020-....">
            <label for="program">Purpose</label>
            <select name="purpose" id="">
                <option value="Scholarship">Scholarship</option>
                <option value="Work">Work</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </section> -->

</body>

































<footer>
    <div class="footer-secondary">
        <div class="second-foot-content">

            <img src="assets/cvsuone-logo-white.png" alt="">
            <p class="tagline">Keep your documents in one place</p>

            <div class="soc-links">
                <span>Connect with Us!</span>
                <a href="#">
                    <iconify-icon icon="ic:baseline-facebook"></iconify-icon> CvSU - Silang Campus
                </a>


                <a href="#">
                    <iconify-icon icon="ic:baseline-facebook"></iconify-icon> CvSU Silang - OSAS
                </a>

                <a href="#">
                    <iconify-icon icon="material-symbols:mark-email-read-outline"></iconify-icon>
                    registrar.silang@cvsu.edu.ph
                </a>
            </div>
        </div>
    </div>



    <div class="footer-main">
        <div>
            <img src="assets/cvsu-logo-name-white.png" alt="">
            <span>© 2022 Cavite State University - Silang</span>
            <ul>
                <li>
                    <a href="#">Contact the University</a>
                </li>
                <li><a href="#">Accessibility</a></li>
                <li><a href="#">Freedom of Information</a></li>
                <li><a href="#">Terms and Conditions</a></li>
            </ul>
        </div>






    </div>
</footer>

</html>