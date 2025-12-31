<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$usrlevel = $_SESSION["userlevel"];
$usrname = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="container mt-4">
    <?php
    switch($usrlevel) {
        case 1: include('menuAdmin.php'); break;
        case 2: include('menuUser1.php'); break;
    }
    ?>

    <h1>Photo Gallery</h1>
    <div class="row">
        <div class="col-md-4 mb-3">
            <img src="image/photo1.jpg" class="img-fluid rounded" alt="Gallery Photo 1">
        </div>
        <!-- More photos can be added here -->
    </div>
</body>
</html>