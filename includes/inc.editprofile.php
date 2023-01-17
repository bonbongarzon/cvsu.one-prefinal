<?php

include("connect.php");
include("functions.php");



if (isset($_POST['updateStudentInfo'])) {



    // Personal Information
    $studentNumber = $_SESSION['student_exist'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $studentContact = $_POST['studentContact'];
    $email = $_POST['email'];
    $cvsuEmail = $_POST['cvsuEmail'];
    $addressA = $_POST['addressA'];
    $addressB = $_POST['addressB'];
    $addressC = $_POST['addressC'];
    $addressD = $_POST['addressD'];



  $complete_address = $addressA . ", " . $addressB . ", " . $addressC . ", " . $addressD;

    // Academic Records

    $program = $_POST['program'];
    $yearEnrolled = $_POST['yearEnrolled'];
    $campus = "Silang";
    $class = $_POST['class'];


    // Previous School Records

    $LRN = $_POST['LRN'];
    $prevProgram = $_POST['prevProgram'];
    $prevSchool = $_POST['prevSchool'];

    // Additional Info

    $fathers_name = $_POST['fathers_name'];
    $fathersContact = $_POST['fathersContact'];
    $fathersAddress = $_POST['fathersAddress'];

    $mothers_name = $_POST['mothers_name'];
    $mothersContact = $_POST['mothersContact'];
    $mothersAddress = $_POST['mothersAddress'];


    $guardian_name = $guardianContact = $guardianAddress = "";


    // Check who's the Guardian

    // $fatherAsGuardian = $_POST['fatherAsGuardian'];
    // $motherAsGuardian = isset($_POST['motherAsGuardian']);
    if (isset($_POST['fatherAsGuardian']) == 1) {
        $guardian_name = $fathers_name;
        $guardianContact = $fathersContact;
        $guardianAddress = $fathersAddress;
    } else if (isset($_POST['motherAsGuardian']) == 1) {
        $guardian_name = $mothers_name;
        $guardianContact = $mothersContact;
        $guardianAddress = $mothersAddress;
    } else {
        $guardian_name = $_POST['guardian_name'];
        $guardianContact = $_POST['guardianContact'];
        $guardianAddress = $_POST['guardianAddress'];
    }

    $update = "UPDATE `student_info` SET `firstName`=' $firstname',`middleName`='$middlename',`lastName`='$lastname',`suffix`='$suffix',`gender`='$gender',`birthdate`='$birthdate',`studentContact`='$studentContact',`email`='$email',`cvsuEmail`='$cvsuEmail',`studentAddress`='$complete_address',`enrolledProgram`='$program',`yearEnrolled`='$yearEnrolled',`campus`='$campus',`class`='$class',`LRN`='$LRN',`prevProgram`='$prevProgram',`prevSchool`='$prevSchool',`fathersName`='$fathers_name',`fathersContact`='$fathersContact',`fathersAddress`='$fathersAddress',`mothersName`='$mothers_name',`mothersContact`='$mothersContact',`mothersAddress`='$mothersAddress',`guardiansName`='$guardian_name',`guardiansContact`='$guardianContact',`guardiansAddress`='$guardianAddress' WHERE `studentNumber`='$studentNumber'";
    $query = mysqli_query($conn, $update);
    // echo "<script>alert('Your information is updated successfully!');</script>";
    // header("Location: ../reqForm.php");
    echo '
    <script>
alert("Your data is updated successfully!");
setTimeout(redirect, 0500);
function redirect() {
  window.location.href = "../reqForm.php";
}
</script>';
}
