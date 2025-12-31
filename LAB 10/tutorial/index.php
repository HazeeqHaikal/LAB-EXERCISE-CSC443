<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>OOP in PHP</title>
    <?php include("class_lib.php"); ?>
</head>
<body>
    <?php
        // 1. Instantiate a person object using the constructor
        $stefan = new person("Stefan Mischook");
        echo "Stefan's full name: " . $stefan->get_name();
        
        echo "<br />";

        // 2. Instantiate an employee object (demonstrating inheritance)
        $james = new employee("Johnny Fingers");
        echo "James's full name: " . $james->get_name();

        /* Note: The lab mentions testing private access.
        Uncommenting the line below would cause an error because $pinn_number is private.
        echo "Tell me private stuff: " . $stefan->pinn_number; 
        */
    ?>
</body>
</html>