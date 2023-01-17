<?php

session_start();
include("connect.php");

$errors = array();

function showAlerts($messages)
{
    echo '<script>alert("' . $messages . '")</script>';
}


function consoleLogs($logs)
{
    echo '<script>console.log("' . $logs . '")</script>';
}

function returnPage()
{
    echo "<script>history.go(-1)</script>";
}


function comparePassword()
{

    $passwordA = md5($_POST['passwordA']);
    $passwordB = md5($_POST['passwordB']);
    if ($passwordA == $passwordB) {
        $passwordMatch = "true";
    } else {
        $passwordMatch = "false";
    }

    return $passwordMatch;
}


function checkAccountExistence($conn)
{

    $studentNumber = $_POST['studentNumber'];
    $sql = "SELECT * FROM `student_user` WHERE `student_number` = $studentNumber";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    if ($row > 0) {

        // echo $row['student_number'];
        $db_studentNumber = $row['student_number'];
        consoleLogs("Account exist: " . $db_studentNumber);
        $existence = "true";
    } else {
        // consoleLogs("Account doesn't exist: Allowed to create an account");
        $existence = "false";
    }
    return $existence;
}

function checkIfEnrolled($conn)
{
    $studentNumber = $_POST['studentNumber'];
    $sql = "SELECT * FROM `enrolled` WHERE `student_number` = $studentNumber";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row > 0) {

        $existence = "true";
    } else {
        // consoleLogs("User not enrolled");
        $existence = "false";
        echo "<script>history.go(-1)
        </script>";
    }

    return $existence;
}


function insertRegistrationData($conn)
{
    consoleLogs("Insertion started");
    $studentNumber = $_POST['studentNumber'];
    $email = $_POST['email'];
    $passwordA = md5($_POST['passwordA']);

    $sql = "INSERT INTO `student_user`(`student_number`, `email`, `password`) VALUES ('$studentNumber','$email','$passwordA') LIMIT 1";

    $query = mysqli_query($conn, $sql);



    consoleLogs("Data inserted");
}









if (isset($_POST['CreateAccount'])) {
    consoleLogs("Process Starting");

    if (comparePassword() == "true") {

        consoleLogs("Password Matched: " . comparePassword());


        if (checkAccountExistence($conn) == "false") {

            consoleLogs("Already Registered : " . checkAccountExistence($conn));

            if (checkIfEnrolled($conn) == "true") {
                consoleLogs("User is enrolled : " . checkIfEnrolled($conn));
                insertRegistrationData($conn);
                $studentNumber = $_POST['studentNumber'];

                // getUserID($conn,$studentNumber );
                $_SESSION['student_exist'] = $studentNumber;
                consoleLogs("Data Inserted ");
                header("Location:../registration.php");
                // header('Location: ../registration.php?id='.$studentNumber);
            } else {
                consoleLogs("User is enrolled : " . checkIfEnrolled($conn));
                showAlerts("You are not enrolled in the institution");
            }
        } else {

            consoleLogs("Already Registered : " . checkAccountExistence($conn));
            consoleLogs("Proceeds to Login Page");
            include_once('prompt.php');
        }
    } else {

        consoleLogs("Password Matched: " . comparePassword());
        showAlerts("Passwords doesn't matched!");
        echo "<script>history.go(-1)
        </script>";
    }
}








if (isset($_POST['createStudAccount'])) {



    // Personal Information
    $studentNumber = $_POST['studentNumber'];
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

    $fatherAsGuardian = isset($_POST['fatherAsGuardian']);
    $motherAsGuardian = isset($_POST['motherAsGuardian']);
    if ($fatherAsGuardian == 1) {
        $guardian_name = $fathers_name;
        $guardianContact = $fathersContact;
        $guardianAddress = $fathersAddress;
    } else if ($motherAsGuardian == 1) {
        $guardian_name = $mothers_name;
        $guardianContact = $mothersContact;
        $guardianAddress = $mothersAddress;
    } else {
        $guardian_name = $_POST['guardian_name'];
        $guardianContact = $_POST['guardianContact'];
        $guardianAddress = $_POST['guardianAddress'];
    }


    // Check student existence

    $sql = "SELECT * FROM `enrolled` WHERE `student_number` = $studentNumber";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $existence = '';
    if ($row > 0) {

        $existence = true;
    } else {
        $existence = false;

        $messages = "You have to be enrolled in the institution before creating an account!";

        showAlerts($messages);
        echo "<script>history.go(-1)
        </script>";
    }

    if ($existence = 1) {
        $sql_insertData = "INSERT INTO `student_info`(`studentNumber`, `firstName`, `middleName`, `lastName`, `suffix`, `gender`, `birthdate`, `studentContact`, `email`, `cvsuEmail`, `studentAddress`, `enrolledProgram`, `yearEnrolled`, `campus`, `class`, `LRN`, `prevProgram`, `prevSchool`, `fathersName`, `fathersContact`, `fathersAddress`, `mothersName`, `mothersContact`, `mothersAddress`, `guardiansName`, `guardiansContact`, `guardiansAddress`) VALUES 
    ('$studentNumber',
     '$firstname ',
     '$middlename',
     '$lastname',
     '$suffix',
     '$gender',
     '$birthdate',
     '$studentContact',
     '$email',
     '$cvsuEmail',
     '$complete_address',
     '$program',
     '$yearEnrolled',
     '$campus',
     '$class',
     '$LRN',
     '$prevProgram',
     '$prevSchool',
     '$fathers_name',
     '$fathersContact',
     '$fathersAddress',
     '$mothers_name',
     '$mothersContact',
     '$mothersAddress',
     '$guardian_name',
     '$guardianContact',
     '$guardianAddress') LIMIT 1";

        $query = mysqli_query($conn, $sql_insertData);
        $_SESSION['student_exist'];
        showAlerts($message = "You've create an account successfully");
        header("Location:../reqForm.php");
    } else {

        showAlerts("You are not allowed to create an account");
    }
}




// LOGOUT

if (isset($_POST['logout'])) {

    session_destroy();

    // redirect to the login page
    header('Location: login.php');
    showAlerts("Session Destroyed");
}












// LOGIN FUNCTIONS




function checkSession()
{

    if (!isset($_SESSION['user_exist'])) {
        header("Location:../loginpage.php");
    } else {
        consoleLogs("Session Exists");
    }
}




// function validateLoginInfo($conn, $errors)
// {
//     $studentNumber = $_POST['student_number'];
//     $studentEmail = $_POST['student_email'];
//     $hashPassword = md5($studentPassword = $_POST['student_password']);


//     $sql = "SELECT * FROM `student_user` WHERE `student_number` = '$studentNumber'";

//     $result = mysqli_query($conn, $sql);

//     $row = mysqli_fetch_assoc($result);


//     if ($row > 0) {

//         $id = $row['id'];
//         $sn = $row['student_number'];
//         $se = $row['email'];
//         $sp = $row['password'];



//         if ($hashPassword == $sp  && $studentEmail == $se) {
//             consoleLogs("Data Correct");
//             consoleLogs("Login Validation Success");
//             return "true";
//         } else {
//             consoleLogs("Something went wrong : Password don't matched");
//             return "false";
//         }
//     } else {
//         array_push($errors, "No Account");
//         return "false";
//     }
// }




//WHEN LOGIN BUTTON CLICKED
// if (isset($_POST['studentLogin'])) {
//     consoleLogs("Performing Login Validation");
//     validateLoginInfo($conn, $errors);


//     if (validateLoginInfo($conn, $errors) == "true") {
//         $studentNumber = $_POST['student_number'];
//         $_SESSION['user_exist'] = $studentNumber;
//         header('Location:../home.php');
//     } else {
//         consoleLogs('Something went wrong : wrong information');
//     }
// }


function checkStudentInfo($conn)
{

    $user = $_SESSION['user_exist'];

    $sql = "SELECT * FROM 'student_info' WHERE 'student_number' ='$user'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
}


function checkUserExist(){

    if (!isset($_SESSION['student_exist'])){
        echo "<script>history.go(-1)
        </script>";
    } else{
        $user = $_SESSION['student_exist'];
        return $user;
    }
        
}