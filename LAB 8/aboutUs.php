<?php
session_start();

// 1. Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// 2. EXTRA SECURITY: Check if user is Admin (Level 1)
// If a normal user tries to access this page, redirect them back to home.
if ($_SESSION["userlevel"] != 1) {
    echo "<script>alert('Access Denied. Admins Only.'); window.location.href='index.php';</script>";
    exit;
}

$usrlevel = $_SESSION["userlevel"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <?php
        // Since only Admin can access this, we can just include menuAdmin
        // But using the switch is safer practice
        switch($usrlevel) {
            case 1:
                include('menuAdmin.php');
                break;
            default:
                // This case shouldn't be reached due to the check above, but good for safety
                include('menuUser1.php'); 
                break;
        }
    ?>

    <div class="container">
        <h1>About Us</h1>
        <p>This page is only visible to Administrators (User Level 1).</p>
        
        <h3>Our Mission</h3>
        <p>To provide secure authentication systems using PHP sessions.</p>
        
        <h3>Contact</h3>
        <p>Email: admin@demo.com</p>
    </div>
</body>
</html>