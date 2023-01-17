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
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="index.php" method="POST">
        <label for="Name">Name</label>
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
    <script src="" async defer></script>
</body>

</html>