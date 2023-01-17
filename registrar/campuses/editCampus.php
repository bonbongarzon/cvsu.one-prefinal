<?php

$user_id = $_REQUEST["id"];

// echo $user_id;

include ("../connect.php");
include ("functions.php");

$get_record = mysqli_query($db,"SELECT * FROM campuses WHERE id='$user_id'");


while ($row_edit = mysqli_fetch_assoc($get_record)){
    $db_campusName = $row_edit["campus_name"];
    $db_campusAddress = $row_edit["campus_address"];
    $db_campusStatus = $row_edit["campus_status"];
}






function showDepartments($db, $db_campusName)
{
    $sql = "SELECT * FROM departments WHERE campus = '$db_campusName'" ;
    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $showDeptName = $row["department_name"];
        echo $showDeptName . "<br>";
    }
}







if(isset($_POST['updatingCampus'])){
    
    $new_campusName = $_POST["new_name"];
    $new_campusAddress = $_POST["new_address"];
    $new_campusStatus = $_POST["new_status"];

    mysqli_query($db, "UPDATE campuses SET campus_name='$new_campusName',campus_address = '$new_campusAddress', campus_status='$new_campusStatus' WHERE id = ' $user_id'");
    echo "<script language='javascript'>alert('Record has been updated!')</script>";
    echo "<script>window.location.href='campuses.php';</script>)";
}








$createOption = mysqli_query($db,"SELECT * FROM campuses WHERE id = '$user_id'");
while ($row = mysqli_fetch_assoc($createOption)) {

    $option = ($row["campus_status"]);
}

showData($db)
?>
<a href="campuses.php">Back</a>

<form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">


<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
<label for="">Campus Name: </label>
<input type="text" name="new_name" value="<?php echo $db_campusName;?>">

<label for="">Campus Address: </label>
<input type="text" name="new_address" value="<?php echo $db_campusAddress;?>">

<label for="">Status : </label>
<select name="new_status">
<option value="0">Please Select Status</option>
<option value="Active" <?php if($option=="Active") echo 'selected="selected"'; ?> >Active</option>
<option value="Inactive" <?php if($option=="Inactive") echo 'selected="selected"'; ?> >Inactive</option>
</select>
<input type="submit" name="updatingCampus" value="Update">


</form>

<hr>

<?php
showDepartments($db,$db_campusName);


?>

