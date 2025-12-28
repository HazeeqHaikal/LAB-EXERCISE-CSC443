<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
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
    <title>Home Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <?php
        switch($usrlevel) {
            case 1:
                include('menuAdmin.php');
                break;
            case 2:
                include('menuUser1.php');
                break;
        }
    ?>
    
    <h1>Welcome <?php echo $usrname; ?> to My Home Page</h1>
    <p>This is my website</p>
    <p><img class="img-fluid rounded img-thumbnail" 
        src="image/banner.jpg" alt="" height="200" width="200"></p>
</body>
</html>