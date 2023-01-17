<?php



include('connect.php');

include_once('functions.php');







function checkIfStudentHasInfo($conn, $user)
{
    consoleLogs("Student Info Verification Started");
    $sql = "SELECT * FROM student_info WHERE studentNumber = '$user'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($row > 0) {

        $studInfo_id = $row['id'];
        echo $firstName = $row['firstName'];
        echo $lastName = $row['lastName'];
        echo $enrolledProgram = $row['enrolledProgram'];
        echo  $address = $row['studentAddress'];

        if (empty($firstName) && empty($lastName) && empty($enrolledProgram)) {
            consoleLogs("No Student Info");
            // header('Location: ../registration.php');

            return "false";
        } else {

            consoleLogs("Has Student Info");
            $_SESSION['student_exist'] = $user;
            header('Location: ../reqForm.php');
            return "true";
        }
    } else {

        // header('Location: ../registration.php');
        consoleLogs("Kimmy");
        return "false";
    }
}














function checkLoginInput($conn)
{
    
     
    $sn = $_POST['studentNumber'];
    $se = $_POST['email'];
    $sp = md5($_POST['password']);
    $error = "Email or Password is incorrect";
    $error2 = "Student ID not found";
   


    $sql = "SELECT * FROM student_user WHERE student_number = '$sn'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($row > 0) {
        $db_id = $row['id'];
        $db_sn = $row['student_number'];
        $db_se = $row['email'];
        $db_sp = $row['password'];

        if ($se == $db_se && $sp == $db_sp) {

            consoleLogs("Proceeds to Homepage");
            return true;

        } 
     else {

            $_SESSION["error"] = $error;
            echo "<script>history.go(-1)</script>";
        return false;
    } 

}
}



if (isset($_POST['studentLogin'])) {
    // echo $user;
    // $_SESSION['student_exist'] = $user;
    // $_SESSION['user_sn'] = $user;
    if (checkLoginInput($conn) == 1) {
        consoleLogs("Proceeds to Student Info Verification");
        $user = $_POST['studentNumber'];
        checkIfStudentHasInfo($conn, $user);

    }else{
         $error3 = "invalid student number";
         $_SESSION["error3"] = $error3;
            echo "<script>history.go(-1)</script>";
        return false;
        
    }
}

?>