
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
<!-- <nav>
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
            <a href="" class="cta-btn"> Log in </a>
        </div>
    </div>
    <div class="main-lower-nav-bar">
        <div class="lower-nav-bar">
            <a href="#" class="cvsu-logo"><img src="assets/header-cvsu-logo-black2x.png" alt=""></a>
            <a href="home.html">Study at CvSU</a>
            <a href="#">About the University</a>
            <a href="#">News & Updates</a>
            <a href="#" id="registrar_nav_btn" class="active">Registrar</a>
        </div>
    </div>
</nav> -->


<?php

include('navbar.php');


if(isset($_SESSION['student_exist'])){
    header('Location:loginpage.php');
}


?>
<section>
    <div class="general-hero-bg">
        <div class="general-hero-cont">
            <div class="left-login">

                <h3>Cavite State University - Silang Campus</h3>
                <br>
                <h1>
                    Welcome to cvsu.one, keep your documents in one place...
                </h1>
                <br>
                <a href="#">Know More!!</a>

            </div>
            <div class="right">

                <div class="login-card" id="login-tab">

                    <div class="semi-header">
                        <p>Create an<span> <img src="assets/cvsuone-logo-black.png" alt=""></span>
                            account </p>
                    </div>

                    <div class="forms">
                        <form action="includes/functions.php" method="post">
                            <label for="">Student Number</label>
                            <input type="text" name="studentNumber" onkeypress="return onlyNumberKey(event)" maxlength="9" required>
                            <label for="">Email</label>
                            <input type="email" name="email" required>
                            <label for="">Password</label>
                            <input type="password" name="passwordA" minlength="6" required>
                            <label for="">Confirm Password</label>
                            <input type="password" name="passwordB" minlength="6" required>
                            <button type="submit" name="CreateAccount">Register</button>
                    </div>
                    </form>
                    <div>
                        <span>Already has account? <a href="loginpage.php">Click Here</a></span>
                    </div>

                </div>





            </div>
        </div>
    </div>
</section>

<section class="core">
    <h4>Our Vision</h4>
    <h4>Our Mission</h4>
    <p><i>The Premier University in historic Cavite recognized for excellence in the development of globally and morally upright individuals.</i></p>

    
    <p><i>Cavite State University shall provide excellent, equitable, and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities.
<br>
        It shall produce professional, skilled and morally upright individuals for global competitiveness.</i></p>
</section>
<?php

include('footer.php');

?>