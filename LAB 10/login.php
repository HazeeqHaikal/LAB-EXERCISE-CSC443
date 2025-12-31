<?php
// Include config file
require_once("dbConnect.php");

// Initialize message variable
$message = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $username = trim($_POST["username"]);
    $password = md5(trim($_POST["password"]));

    // SQL statement
    $sql = "SELECT userlevel FROM users WHERE username = '$username' AND userpassword = '$password'";
    $result = mysqli_query($dbCon, $sql);

    if (!$result) {
        die("Database access failed: " . mysqli_error($dbCon));
    } else {
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userlevel'] = $row['userlevel'];
            header("location: index.php");
            exit;
        } else {
            $message = 'Wrong Username & Password';
        }
    }
    mysqli_close($dbCon);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            font: 14px sans-serif;
            display: flex;
            justify-content: center;
            padding: 50px;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .message {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Login Page</h2>
        <p>Please fill this form to access the system.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="message"><?php if ($message != "") echo $message; ?></div>
            <div class="form-group mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>
            <p>Don't have an account? <a href="register.php">Register Here</a>.</p>
        </form>
    </div>
</body>

</html>