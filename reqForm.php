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
</head>


<?php 
include('php/reqDoc-nav.php') 
?>

<section class="content">
    <div class="left-panel">
        <ul>
            <li>Student No.: &nbsp <?php echo $id . "-" . $user ?></li>
            <li><a href="reqForm.php">Request Docs</a></li>
            <li><a href="editprofilepage.php">Edit Profile</a></li>
            <li><a href="includes/logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="right-panel">
        <div>
            <div class="right-panel-cta">
                <h3>Request a Document</h3>
                <p>Get your document by filling-in the necessary informations.</p>
            </div>
            <div class="form-set">
                <div>
                    <form action="generatePDF.php" method="POST">
                        <label>Student No:<span> <?php echo $user ?></span></label>
                        <input type='hidden' name='studentNumber' value='<?php echo "$user"; ?>' />

                        <br>
                        <label>Name: <span> <?php echo $firstName . substr($middleName, 0, 1) . ". " . $lastName; ?></span></label>
                        <br>
                        <label>Course:<span><?php echo returnCourse($course) ?></span></label>
                </div>
                <div>
                    <div>
                        <table border="0">
                            <tr>
                                <td> <label for="documentType">Type of Document: </label></td>
                                <td><select name="documentType" id="">
                                        <option value="COG">Certificate of Grades</option>
                                        <option value="No ID">Non-Issuance of ID</option>
                                        <option value="CGM">Certificate of Good Moral</option>
                                    </select></td>
                                <td> <label for="schoolyear">School Year: </label></td>
                                <td><select name="schoolyear" id="">
                                        <option value="2015-2016">2015-2016</option>
                                        <option value="2016-2017">2016-2017</option>
                                        <option value="2017-2018">2017-2018</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023" selected>2022-2023</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td> <label for="semester">Semester: </label></td>
                                <td><select name="semester" id="">
                                        <option value="First Semester" selected>First Semester</option>
                                        <option value="Second Semester">Second Semester</option>
                                        <option value="Mid-year">Mid-year</option>
                                    </select></td>
                                <td><label for="purpose">Purpose: </label></td>
                                <td><select name="purpose" id="">
                                        <option value="Scholarship">Scholarship</option>
                                        <option value="Work">Work</option>
                                    </select></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div>
                    <button type="submit" name="request">Proceed...</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</section>