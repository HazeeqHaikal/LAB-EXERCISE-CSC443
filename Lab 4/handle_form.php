<html>

<head>
    <title>Form Feedback</title>
</head>

<body>
    <?php # Script handle_form.php

    // Initialize variables
    $name = null;
    $email = null;
    $comments = null;
    $gender = null;
    $message = '';

    // Validate Name [cite: 50-55]
    if (strlen($_POST["name"]) > 0) {
        $name = $_POST["name"];
    } else {
        $name = null;
        echo '<p><b>You Forgot to Enter Your Name!</b></p>';
    }

    // Validate Comments [cite: 56-62]
    if (strlen($_POST["comments"]) > 0) {
        $comments = $_POST["comments"];
    } else {
        $comments = null;
        echo '<p><b>You Forgot to Enter Your Comments!</b></p>';
    }

    // Validate Email [cite: 63-65]
    if (strlen($_POST["email"]) > 0) {
        $email = $_POST["email"];
    } else {
        $email = null;
        echo '<p><b>You Forgot to Enter Your Email!</b></p>';
    }

    // Check Gender [cite: 67-77]
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
        if ($gender == 'M') {
            $message = '<b><p>Good Day, Sir!</p></b>';
        }
        if ($gender == 'F') {
            $message = '<b><p>Good Day, Madam!</p></b>';
        }
    } else {
        $gender = null;
        echo '<p><b>You Forgot to Choose Your Gender!</b></p>';
    }

    // Print the message if all tests passed [cite: 78-80]
    if ($name && $comments && $email && $gender) {
        echo "<p>Thank you, <b>$name</b> for the following comments: <br />" .
            "<tt>$comments</tt></p>" .
            "<p>We will reply to you at <i>$email</i>.</p>";

        echo $message;
    }
    ?>
</body>

</html>