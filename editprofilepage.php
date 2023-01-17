<?php
include_once('includes/functions.php');
include('includes/inc.requestForm.php');
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
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>




</head>

<body>
    <?php
    // if(!isset($_GET['id'])){
    //     header("Location:pre-reg.php");
    // } else {
    //     $id = strval($_GET['id']);
    //    $_SESSION['student_number'] = $id;

    // }
    if (!isset($_SESSION['student_exist'])) {
        header("Location:pre-reg.php");
    } else {
        consoleLogs($_SESSION['student_exist']);
        $user = $_SESSION['student_exist'];



        $getInfo = "SELECT * FROM student_info WHERE studentNumber = $user";

        $result = mysqli_query($conn, $getInfo);
        $row = mysqli_fetch_assoc($result);
        if ($row > 0) {

            $id = $row['id'];
            $studentNumber = $row['studentNumber'];

            if ($row['suffix'] != "") {
                $suffix = $row['suffix'];
            } else {
                $suffix = "";
            }

            $course = $row['enrolledProgram'];
            $course = returnCourse($course);

            $separator = $row['studentAddress'];

            $data_array = explode(", ", $separator);
            [$address1, $address2, $address3, $address4] = $data_array;
        }
    }





    ?>



    <section>
        <div class="general-hero-bg">
            <div class="general-hero-cont">
                <div class="left-reg">
                    <h3>Cavite State University - Silang Campus</h3>
                    <h1>
                        Edit My Account
                    </h1>
                    <p>With cvsu.one, you can request your documents online! </p>

                    <br>
                    <a href="reqForm.php">Back to Dashboard</a>
                </div>

            </div>
        </div>
    </section>


    <form action="includes/inc.editprofile.php" id="myform" method="POST">
        <div class="form-grid">
            <div>
                <h1>Edit my Information</h1>
                <br>
                <hr>
            </div>

            <h3>Personal Information</h3>

            <span>

                <?php


                ?>
                <label for="">Student Number</label>

                <input type="text" name="studentNumber" id="" onkeypress="return onlyNumberKey(event)" maxlength="9" value="<?php echo $user; ?>" disabled>
            </span>
            <span>
                <label for="">Last Name</label>

                <input type="text" name="lastname" id="" value="<?php echo $row['lastName']; ?>">
            </span>
            <span>
                <label for="">First Name</label>

                <input type="text" name="firstname" id="" value="<?php echo $row['firstName']; ?>">
            </span>
            <span>
                <label for="">Middle Name</label>

                <input type="text" name="middlename" id="" value="<?php echo $row['middleName']; ?>">
            </span>
            <span>
                <label for="">Suffix (if applicable)</label>

                <input type="text" name="suffix" id="" value="<?php echo $suffix; ?>">
            </span>
            <span>
                <label for="">Gender</label><br>
                <span class="gender-flex">
                    <input type="radio" name="gender" value="Male" id="genderRadio1" value="<?php echo $row['gender']; ?>" <?php if ($row['gender'] == "Male") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                    <label for="">Male</label>
                    <input type="radio" name="gender" value="Female" id="genderRadio1" value="<?php echo $row['gender']; ?>" <?php if ($row['gender'] == "Female") {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                    <label for="">Female</label>
                    <input type="radio" name="gender" value="Other" id="genderRadio3" value="<?php echo $row['gender']; ?>" <?php if ($row['gender'] == "Other") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                    <label for="">Other</label>
                </span>
            </span>
            <span>
                <label for="">Date of Birth</label>

                <input type="date" name="birthdate" id="" value="<?php echo $row['birthdate']; ?>">
            </span>

            <span>
                <label for="">Contact Number</label>

                <input type="text" name="studentContact" id="" onkeypress="return onlyNumberKey(event)" maxlength="13" value="<?php echo $row['studentContact']; ?>">
            </span>
            <span>
                <label for="">Personal Email</label>

                <input type="text" name="email" id="" value="<?php echo $row['email']; ?>">
            </span>
            <span>
                <label for="">CvSU Email</label>

                <input type="text" name="cvsuEmail" id="" value="<?php echo $row['cvsuEmail']; ?>">
            </span>

            <span>
                <label for="">Home Number / Blk & Lot</label>

                <input type="text" name="addressA" id="" value="<?php echo $address1; ?>">
            </span>
            <span>
                <label for="">Street / Barangay</label>

                <input type="text" name="addressB" id="" value="<?php echo $address2; ?>">
            </span>
            <span>
                <label for="">City / Town</label>

                <input type="text" name="addressC" id="" value="<?php echo $address3; ?>">
            </span>
            <span>
                <label for="">Province</label>

                <input type="text" name="addressD" id="" value="<?php echo $address4; ?>">
            </span>







            <h3><span>—</span> Academic Records</h3>
            <span>
                <label for="">Enrolled Program</label>

                <select name="program" id="" value="<?php echo $course ?>">
                    <option value="BED" <?php if ($row['enrolledProgram'] == "BED") echo "selected"; ?>>Bachelor of Elementary Education</option>
                    <option value="BsED" <?php if ($row['enrolledProgram'] == "BsED") echo "selected"; ?>>Bachelor of Secondary Education</option>
                    <option value="BSBM" <?php if ($row['enrolledProgram'] == "BSBM") echo "selected"; ?>>BS Business Management</option>
                    <option value="BSCS" <?php if ($row['enrolledProgram'] == "BSCS") echo "selected"; ?>>BS Computer Science</option>
                    <option value="BSHM" <?php if ($row['enrolledProgram'] == "BSHM") echo "selected"; ?>>BS Hospitality Management (formerly BS Hotel and Restaurant Management)</option>
                    <option value="BSIT" <?php if ($row['enrolledProgram'] == "BSIT") echo "selected"; ?>>BS Information Technology</option>
                    <option value="BSPsy" <?php if ($row['enrolledProgram'] == "BSPsy") echo "selected"; ?>>BS Psychology</option>
                    <option value="BSTM" <?php if ($row['enrolledProgram'] == "BSTM") echo "selected"; ?>>BS Tourism Management</option>
                    <option value="HS" <?php if ($row['enrolledProgram'] == "HS") echo "selected"; ?>>Laboratory / Science High School</option>
                </select>
            </span>
            <span>
                <label for="">Year Enrolled</label>

                <input type="text" name="yearEnrolled" id="" onkeypress="return onlyNumberKey(event)" maxlength="4" value="<?php echo $row['yearEnrolled']; ?>">
            </span>

            <span> <label for="">Campus</label>

                <select name="campus" disabled>
                    <option value="Bacoor">Bacoor Campus</option>
                    <option value="Carmona">Carmona Campus</option>
                    <option value="Cavite City">Cavite City Campus</option>
                    <option value="General Trias">General Trias Campus</option>
                    <option value="Imus">Imus Campus</option>
                    <option value="Maragondon">Maragondon Campus</option>
                    <option value="Naic">Naic Campus</option>
                    <option value="Rosario">Rosario Campus</option>
                    <option value="Silang" selected>Silang Campus</option>
                    <option value="Tanza">Tanza Campus</option>
                    <option value="Trece Martires City ">Trece Martires City Campus</option>
                </select></span>
            <span>
                <label for="">Classification</label>
                <select name="class" id="">
                    <option value="New" <?php if ($row['class'] == "New") echo "selected"; ?>>New</option>
                    <option value="Continuing" <?php if ($row['class'] == "Continuing") echo "selected"; ?>>Continuing</option>
                    <option value="Transferee" <?php if ($row['class'] == "Transferee") echo "selected"; ?>>Transferee</option>
                    <option value="Returnee" <?php if ($row['class'] == "Returnee") echo "selected"; ?>>Returnee</option>
                </select>
            </span>
            <h3>Previous School Records</h3>
            <span>
                <label for="">Learners Reference Number (LRN)</label>
                <input type="text" name="LRN" id="" onkeypress="return onlyNumberKey(event)" maxlength="12" value="<?php echo $row['LRN']; ?>">
            </span>
            <span>
                <label for="">Education / Program</label>
                <input type="text" name="prevProgram" id="" placeholder="SHS - STEM, SHS - TVL, Junior High School" value="<?php echo $row['prevProgram']; ?>">
            </span>
            <span>
                <label for="">School</label>
                <input type="text" name="prevSchool" id="" value="<?php echo $row['prevSchool']; ?>">
            </span>
            <h3>Additional Information</h3>
            <span>
                <label for="">Father's Name </label>
                <input type="text" name="fathers_name" id="" value="<?php echo $row['fathersName']; ?>">
            </span>
            <span>
                <label for="">Contact Number</label>
                <input type="text" name="fathersContact" id="" onkeypress="return onlyNumberKey(event)" maxlength="13" value="<?php echo $row['fathersContact']; ?>">
            </span>
            <span class="set-guardian">
                <input type="checkbox" name="fatherAsGuardian" id="myCheck" onclick="toggleGuardian()">

                <p>Set as Guardian</p>
            </span>
            <span>
                <label for="">Address</label>
                <input type="text" name="fathersAddress" id="" value="<?php echo $row['fathersAddress']; ?>">
            </span>
            <span>
                <label for="">Mother's Name</label>
                <input type="text" name="mothers_name" id="" value="<?php echo $row['mothersName']; ?>">
            </span>

            <span>
                <label for="">Contact Number</label>
                <input type="text" name="mothersContact" id="" onkeypress="return onlyNumberKey(event)" maxlength="13" value="<?php echo $row['mothersContact']; ?>">
            </span>
            <span class="set-guardian">
                <input type="checkbox" name="motherAsGuardian" id="myCheck2" onclick="toggleGuardian()">

                <p>Set as Guardian</p>

            </span>
            <span>
                <label for="">Address</label>
                <input type="text" name="mothersAddress" id="" value="<?php echo $row['mothersAddress']; ?>">
            </span>

            <span class="guardianfield" id="guardianfield1">
                <label for="">Guardian's Name</label>
                <input type="text" name="guardian_name" id="" value="<?php echo $row['guardiansName']; ?>">
            </span>

            <span class="guardianfield" id="guardianfield2">
                <label for="">Contact Number</label>
                <input type="text" name="guardianContact" id="" onkeypress="return onlyNumberKey(event)" maxlength="13" value="<?php echo $row['guardiansContact']; ?>">
            </span>
            <span class="guardianfield" id="guardianfield3">
                <label for="">Address</label>
                <input type="text" name="guardianAddress" id="" value="<?php echo $row['guardiansAddress']; ?>">
            </span>

            <button type="submit"  name="updateStudentInfo" >Update my information</button>
        </div>
    </form>
    <?php
    include 'footer.php';
    ?>

</body>

</html>