<?php

include_once('includes/functions.php');
include_once('includes/inc.login.php');
include_once('includes/inc.requestForm.php');


if(!isset($_SESSION['student_exist'])){
    header("LOCATION:loginpage.php");
}
// checkUserExist();
// if(isset($_SESSION['student_exist'])){
//         // $id = $row[$id];
// echo "SESSION EXISTS";
//     $user = $_SESSION['student_exist'];
// } else {
//     echo "SESSION NOT EXIST";
// }




// if (!isset($_SESSION['user_sn'])) {
//     header('Location: loginpage.php');
// } else {
//     $id = $row['id'];
//     consoleLogs($_SESSION['user_sn']);
//     $user = $_SESSION['user_sn'];
// }

// if(!isset($_SESSION['kimmy'])){
//     $data_status = false;
// } else {
//     unset($_SESSION['kimmy']);
// }

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
    <style>
        #feedback-form {
  width: 470px;
    height: 100%;
    background-color: #ffffff;
      padding: 20px 50px 40px;
  box-shadow: 1px 4px 10px 1px #aaa;
    border-radius: 15px;
    margin: 0 auto;


}

#feedback-form * {
    box-sizing: border-box;
}

#feedback-form h2{
  text-align: center;
  margin-bottom: 30px;
}

#feedback-form input {
  margin-bottom: 15px;
}

#feedback-form input[type=text] {
   padding: 10px 20px;
    width: 100%;
    margin-bottom:10px ;
    border: none;
    border-bottom: solid 1px gray;
    background-color: #00000000;
}

#feedback-form label {
  margin-top: 25px;
    font-size: 11pt;
    font-weight: bold;
    padding: 10px 0px;
}




#feedback-form #feedback-phone {
  transition: .3s;
}

#feedback-form input[type=submit] {
  margin-top: 20px;
    width: 100%;
    background-color: #29711D;
    border: none;
    border-radius: 40px;
    padding: 10px;
    font-size: 11pt;
    color: white;
    
}
#feedback-form img{
    transform: translateY(2.5px);
    width: 100px;
    height: 25px;

}
#feedback-form select{
    width: 100%;
    padding: 10px 5px;

}



    </style>
</head>


<?php 
include('php/reqDoc-nav.php') 
?>

  <?php



include("includes/connect.php");

$get_record = mysqli_query($conn, "SELECT * FROM student_info WHERE id='$id'");

while($row_edit = mysqli_fetch_assoc($get_record)) {
    
    $lastName = $row_edit["lastName"];
    $firstName = $row_edit["firstName"];
    $middleName = $row_edit["middleName"];
    $suffix = $row_edit["suffix"];
    $enrolledProgram= $row_edit["enrolledProgram"];
}
?>


<section class="content">
    <div class="left-panel">
        <ul>
            <li>Student No.: &nbsp <?php echo $id . "-" . $user ?></li>
            <li><a href="reqForm.php">Home</a></li>
            <li><a href="profile.php">Edit Profile</a></li>
            <li><a href="includes/logout.php">Log Out</a></li>
        </ul>
    </div>
     <div class="right-panel">
        <div>
            <div class="right-panel-cta">
                <h3>Student Profile</h3>
                <p>Manage your personal information.</p>
            </div>

            <div id="feedback-form">

                        <center>
                        <span> <img src="assets/cvsuone-logo-black.png" alt=""></span>
                         <br>
                          <br>
                          </center>
                            


                <div>
                    <form method="POST" action="edit.php">

                        <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                        <label>Last Name: </label>
                        <input type="text" name="new_lname" value="<?php echo $lastName; ?>" required>
                        <br>
                        
                        <label>First Name: </label>
                        <input type="text" name="new_fname" value="<?php echo $firstName; ?>"required>
                        <br>
                        
                        <label>Middle Name: </label>
                        <input type="text" name="new_mname" value="<?php echo $middleName; ?>"required>
                        <br>

                        <label>Suffix (If applicable): </label>
                        <input type="text" name="new_suffix" value="<?php echo $suffix; ?>">
                        <br>

                          <label>Enrolled Program: </label>
                        <select name="new_program" id="">
                        <option value=""><?php echo $enrolledProgram; ?></option>
                    <option value="BED">Bachelor of Elementary Education</option>
                    <option value="BsED">Bachelor of Secondary Education</option>
                    <option value="BSBM">BS Business Management</option>
                    <option value="BSCS">BS Computer Science</option>
                    <option value="BSHM">BS Hospitality Management (formerly BS Hotel and Restaurant Management)</option>
                    <option value="BSIT">BS Information Technology</option>
                    <option value="BSPsy">BS Psychology</option>
                    <option value="BSTM">BS Tourism Management</option>
                    <option value="HS">Laboratory / Science High School</option>
                </select>
                        <br>

                        <input type="submit" value="Update">

                    </form>

                </div>
            </div>



                 

            
           
           