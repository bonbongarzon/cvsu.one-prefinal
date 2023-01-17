<?php

include_once("includes/functions.php");

// if (!isset($_SESSION['user_exist'])) {
//     header('Location:../loginpage.php');
// } else {
// }



?>

<nav>
    <div class="main-upper-nav-bar">
        <div class="upper-nav-bar">
            <div>
                <a href="#">Students</a>
                <a href="#">Alumni</a>
                <a href="#">Visitor</a>
            </div>
            <a href="home.html" class="cvsuone-logo">
                <img src="assets/onelogowhite.logox1.png">
            </a>
            <?php if (isset($_SESSION['student_exist']) || isset($_GET['id'])) : ?>
                <!-- <form action="includes/functions.php" method="post">
                    <input type="logout" name="logout" class="cta-btn">
                </form> -->
                <a href='includes/logout.php'class="cta-btn"> My Account</a></li>



            <?php else : ?>
                <!-- <a href="0register.php">Sign Up</a></li> -->
                <a href="loginpage.php" class="cta-btn">Login</a></li>
            <?php endif; ?>
            <!-- <a href="" class="cta-btn"> Log in </a> -->
        </div>
    </div>





    <div class="main-lower-nav-bar">
        <div class="lower-nav-bar">
            <a href="#" class="cvsu-logo"><img src="assets/header-cvsu-logo-black2x.png" alt=""></a>
            <a href="home.php">Study at CvSU</a>
            <a href="#">About the University</a>
            <a href="#">News & Updates</a>
            <a href="loginpage.php" id="registrar_nav_btn" class="active">Registrar</a>
        </div>
    </div>
</nav>