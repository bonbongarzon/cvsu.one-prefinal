<?php

include("../connect.php");
function showCampuses($db)
{
    $sql = "SELECT * FROM campuses";
    $result = mysqli_query($db, $sql);

    echo "<table border=1>"; // start a table tag in the HTML

    while ($row = mysqli_fetch_array($result)) {

        $campus_id = $row["id"];
        // $campus_name = $row["campus_name"];
        echo "<tr><td> <a href='departments.php?id=$campus_id'>" .
            htmlspecialchars($row['campus_name']) . "</a></td><td>" .
            htmlspecialchars($row['campus_address']) . "</td><td>" .
            htmlspecialchars($row['campus_status']) . "</td><td>
         <a href='editCampus.php?id=$campus_id'>Update</a>&nbsp; 
         </td></tr>";
    }

    echo "</table>";
}
