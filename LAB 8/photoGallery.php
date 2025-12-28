<?php
session_start();

// 1. Check if the user is logged in. If not, redirect to login page.
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// 2. Get user information from the session
$usrlevel = $_SESSION["userlevel"];
$usrname = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        /* Simple styling for the gallery images */
        .gallery-container { display: flex; gap: 20px; padding: 20px; }
        .gallery-item { border: 1px solid #ddd; padding: 5px; }
    </style>
</head>
<body>
    <?php
        // 3. Show the correct menu based on user level
        switch($usrlevel) {
            case 1:
                include('menuAdmin.php');
                break;
            case 2:
                include('menuUser1.php');
                break;
        }
    ?>
    
    <div class="container">
        <h1>Photo Gallery</h1>
        <p>Welcome, <?php echo $usrname; ?>! Here are our photos.</p>
        
        <div class="gallery-container">
            <div class="gallery-item">
                <img src="image/banner.jpg" alt="Photo 1" width="200" height="150">
                <p>Caption 1</p>
            </div>
            <div class="gallery-item">
                <img src="image/banner.jpg" alt="Photo 2" width="200" height="150">
                <p>Caption 2</p>
            </div>
        </div>
    </div>
</body>
</html>