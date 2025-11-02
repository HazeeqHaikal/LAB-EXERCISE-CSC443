<html>

<head>
    <title>Cost Calculator</title>
</head>

<body>
    <?php # Script handle_calculator.php

    // Check if the 'source' GET parameter is set
    if (isset($_GET['source'])) {

        // Get $source data from URL [cite: 118]
        $source = $_GET['source'];

        // Check if the source is correct [cite: 120]
        if ($source == 'calculator.html') {

            // Get quantity, price, taxrate data from the form [cite: 121]
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $taxrate = $_POST['taxrate'];

            // Validate quantity [cite: 122]
            if (is_numeric($quantity) && $quantity > 0) {

                // Perform calculations [cite: 123]
                $total = ($quantity * $price) * ($taxrate + 1);
                $total = number_format($total, 2); // Format to 2 decimal places [cite: 124]

                // Print the results [cite: 125-128]
                echo "You are purchasing <b>" . $_POST["quantity"] .
                    "</b> widgets at a cost of <b> " . $_POST["price"] .
                    "</b> each. With tax the total comes to <b>" .
                    $total . "</b>.\n";
            } else {
                // Invalid quantity [cite: 130]
                echo "<p><b>Please enter a valid quantity to purchase!</b></p>";
            }
        } else {
            // Wrong source [cite: 133]
            echo "<p><b>You have accessed this page inappropriately!</b></p>";
        }
    } else {
        // No source provided [cite: 136]
        echo "<p><b>You have accessed this page inappropriately!</b></p>";
    }
    ?>
</body>

</html>