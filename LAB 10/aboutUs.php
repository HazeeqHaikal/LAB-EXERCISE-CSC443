<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$usrlevel = $_SESSION["userlevel"];
$usrname = $_SESSION["username"];

// About Us might be restricted to Admin only (Optional Check)
if ($usrlevel != 1) {
    // echo "Access Denied for regular users.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body class="container mt-4">
    <?php
    switch ($usrlevel) {
        case 1:
            include('menuAdmin.php');
            break;
        case 2:
            include('menuUser1.php');
            break;
    }
    ?>

    <h1>About Us</h1>
    <p>This page contains information about our organization.</p>
</body>

</html>