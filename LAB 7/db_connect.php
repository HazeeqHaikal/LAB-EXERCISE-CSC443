<?php #Script db_connect.php
/* This file contains the database access information
   This file also establishes a connection to MySQL and 
   selects the database
*/

//set the database access information constants
define ('DB_HOST', '127.0.0.1');
define ('DB_USER', 'root');
define ('DB_PASSWORD', '');
define ('DB_NAME', 'content');

//create a database connection then select the database
$dbCon = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die ("Db Connection failed!".mysqli_error($dbCon));

//if cannot connect to the database in MySQL, error is displayed
?>