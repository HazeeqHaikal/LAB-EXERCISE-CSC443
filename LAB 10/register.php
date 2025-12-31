<?php
// Include dbConnect.php file
require_once("dbConnect.php");

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement to check if username exists
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($dbCon, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please enter confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password & Confirm Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, userpassword, userlevel) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($dbCon, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_userlevel);

            $param_username = $username;
            $param_password = md5($password); // Note: MD5 is used per tutorial instructions
            $param_userlevel = trim($_POST["userlevel"]);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Successfully created an account'); location.href='login.php';</script>";
            } else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($dbCon);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="message"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="message"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group mb-3">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="message"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>
            <input type="hidden" name="userlevel" value="2">
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>