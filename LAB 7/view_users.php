<?php #script view_users.php
//this script retrieves all the records from the users table
$page_title = 'View the Current Users';
include ('header.php');
require_once('db_connect.php'); //connect to database

//make the query
$query = "SELECT CONCAT(last_name, first_name) name, 
          date_format(registration_date, '%M %D, %Y') reg_date
          FROM users ORDER BY registration_date";

$result = mysqli_query($dbCon, $query);

// Updated section based on Lab 7 Step 6 modification:
$num = mysqli_num_rows($result); //count how many users
if ($num > 0) {
    echo "<p><big><b>There are currently $num registered users</b></big></p>";

    echo '<table align="CENTER" width="100%" border="0"
    cellspacing="0" cellpadding="4">
    <tr>
        <td align="left"><b>Name</b></td>
        <td align="left"><b>Date Registered</b></td>
    </tr>';

    //fetch and print all the records
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td align='left'>{$row['name']}</td>
            <td align='left'>{$row['reg_date']}</td>
            </tr>\n";
    }

    echo '</table>';
    mysqli_free_result($result); //free up the resources
} else {
    echo '<p>The users could not be displayed due to a system error.
          We apologized for any inconvenience</p><p>'.mysqli_error($dbCon).'</p>';
}

mysqli_close($dbCon); //close the database connection
include('footer.php');
?>