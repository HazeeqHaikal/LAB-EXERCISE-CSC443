<?php #script register.php
//set the page title and include the HTML header
$page_title = 'Register';
include ('header.php');

if (isset($_POST['submit'])){
    $message = NULL; //create an empty variable

    //check for a first name
    if (empty($_POST['first_name'])){
        $fn = FALSE;
        $message .= '<p>You forgot to enter your first name!</p>';
    } else {
        $fn = $_POST['first_name'];
    }

    //check for a last name
    if (empty($_POST['last_name'])){
        $ln = FALSE;
        $message .= '<p>You forgot to enter your last name!</p>';
    } else {
        $ln = $_POST['last_name'];
    }

    //check for an email address
    if (empty($_POST['email'])){
        $em = FALSE;
        $message .= '<p>You forgot to enter your email address!</p>';
    } else {
        $em = $_POST['email'];
    }

    //check for a username
    if (empty($_POST['username'])){
        $un = FALSE;
        $message .= '<p>You forgot to enter your username!</p>';
    } else {
        $un = $_POST['username'];
    }

    //check for a password and match against the confirmed password
    if (empty($_POST['password1'])){
        $ps = FALSE;
        $message .= '<p>You forgot to enter your password!</p>';
    } else {
        if ($_POST['password1'] == $_POST['password2']){
            $ps = $_POST['password1'];
        } else {
            $ps = FALSE;
            $message = '<p>Your password did not match with confirmed password!</p>';
        }
    }

    if ($fn && $ln && $em && $un && $ps){
        //register the user in the database
        require_once('db_connect.php');
        
        //make the query
        $query = "INSERT INTO users (first_name, last_name, email, password, registration_date, username) VALUES ('$fn', '$ln', '$em', md5('$ps'), NOW(), '$un')";
        
        $result = mysqli_query($dbCon, $query);

        if ($result) {
            echo "<p><b>Thank You, You have been registered!</b></p>";
            include('footer.php');
            exit(); // Stop the script
        } else {
            $message = "<p>You could not be registered due to system error.
                        We apologize for any inconvenience</p>
                        <p>".mysqli_error($dbCon)."</p>";
        }
        
        mysqli_close($dbCon); //close db connection
    }
}

//print the error message if there is error
if (isset($message)){
    echo "<font color='red'>$message</font>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <legend>Enter your information in the form below:</legend>
        
        <p><b>First Name:</b>
            <input type="text" name="first_name" size="20" maxlength="30"
            value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
        </p>
        
        <p><b>Last Name:</b>
            <input type="text" name="last_name" size="20" maxlength="30"
            value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
        </p>
        
        <p><b>Email Address:</b>
            <input type="text" name="email" size="20" maxlength="40"
            value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
        </p>
        
        <p><b>User Name:</b>
            <input type="text" name="username" size="20" maxlength="30"
            value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
        </p>
        
        <p><b>Password:</b>
            <input type="text" name="password1" size="20" maxlength="20"
            value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>" />
        </p>
        
        <p><b>Confirm Password:</b>
            <input type="text" name="password2" size="20" maxlength="20"
            value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>" />
        </p>

        <div align="center"><input type="submit" name="submit" value="Submit Information" /></div>
    </fieldset>
</form>

<?php
include('footer.php');
?>