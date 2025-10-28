<html>

<body>
    <?php
    // Use a for loop to iterate from 1 to 5
    for ($i = 1; $i <= 5; $i++) {
        // Dynamically create the h1, h2, h3, h4, h5 tags
        echo "<h$i>Heading $i</h$i>";
    }
    ?>
</body>

</html>