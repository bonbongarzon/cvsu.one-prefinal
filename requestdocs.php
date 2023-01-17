<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Get your documents</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="req-docs-design.css">
</head>

<nav>
    <div class="cont">
        <a href="#"><img src="assets/cvsuone-logo-black.png" alt="" srcset=""></a>
        <div class="left">
            <!-- <a href="#">About You</a>
            <a href="#">About Documents</a>
            <a href="#">Mode of Delivery</a> -->
        </div>
    </div>
</nav>

<body>

    <section>
        <h1>Get your Documents</h1>
        <form action="generatePDF.php" method="post">
            <table border="0">
                <tr>
                    <td><b>Student Info</b>
                        <br>
                        Provide your personal information
                    </td>
                    <td colspan="3">Student Number<br><input type="text" name="studentnumber" id="" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td>First Name: <br>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </td>
                    <td>Last Name: <br>
                        <input type="text" name="lname" placeholder="Last Name" required><br>
                    </td>

                    <td>Middle Initial <br>
                        <input type="text" name="mName" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td><b>Academic Info</b>
                        <br>
                        Provide your academic information
                    </td>
                    <td>Course/Program: <br>
                        <input type="text" name="program" placeholder="Program" required>
                    </td>
                    <td>Semester: <br>
                        <select name="semester" id="" required>
                            <option value="First">First Semester</option>
                            <option value="Second">Second Semester</option>
                            <option value="Third">Third Semester</option>
                        </select>
                    </td>
                    <td>School Year <br>
                        <input type="text" name="schoolyear" placeholder="2020-...." required>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td>
                        <b>Document Info</b>
                    </td>
                    <td><label for="program" >Purpose</label>
                        <br>
                        <select name="purpose" id="" required>
                            <option value="Scholarship" >Scholarship</option>
                            <option value="Work">Work</option>
                        </select>
                    </td>
                    <td>
                        <label for="program">Purpose</label>
                        <br>
                        <select name="documentType" id="" required>
                            <option value="COG">Certificate of Grade</option>
                            <option value="Non_Issuance">Certificate of Non-Issuance [ ID ]</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3"> <button type="submit" name="request">Submit</button></td>
                </tr>

            </table>

        </form>
    </section>
</body>

</html>