<!DOCTYPE html>
<html>
<head>
    <title>Lab 5 - All Exercises</title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            line-height: 1.6; 
            padding: 20px; 
            background-color: #f9f9f9;
            color: #333;
        }
        .container { 
            max-width: 800px; 
            margin: auto; 
            background-color: #fff;
            border: 1px solid #ddd; 
            border-radius: 8px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .exercise-section {
            padding: 20px 30px;
            border-bottom: 1px solid #eee;
        }
        .exercise-section:last-child {
            border-bottom: none;
        }
        h1 {
            text-align: center;
            color: #444;
            padding-top: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-top: 0;
        }
        h2 { 
            color: #0056b3; 
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 5px;
        }
        table { 
            width: 50%; 
            border-collapse: collapse; 
            margin-top: 15px; 
        }
        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #f4f4f4; 
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        code {
            background-color: #f0f0f0;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: "Courier New", Courier, monospace;
        }
        .temp-list li {
            display: inline-block; 
            margin-right: 5px; 
            background-color: #f0f0f0; 
            padding: 5px 8px; 
            border-radius: 4px;
            list-style-type: none;
        }
        .temp-list {
            padding-left: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CSC443 - Lab 5 (All Exercises)</h1>

        <!-- Exercises 1, 2, & 3 -->
        <div class="exercise-section">
            <h2>Exercises 1, 2 & 3: Indexed Array, Sorting, & Foreach</h2>
            
            <?php
            // 1.a) Indexed array
            $month = array(
                'January', 'February', 'March', 'April',
                'May', 'June', 'July', 'August',
                'September', 'October', 'November', 'December'
            );

            // 1.b) For loop to print months in order
            echo "<h3>Exercise 1: Months in Order</h3>";
            echo "<ul>";
            for ($i = 0; $i < count($month); $i++) {
                echo "<li>" . $month[$i] . "</li>";
            }
            echo "</ul>";

            // 2.a) Sort the months in alphabetical order
            sort($month);

            // 3.a) foreach loop to print the value of the (now sorted) array
            echo "<h3>Exercise 2 & 3: Months Sorted Alphabetically (via foreach)</h3>";
            echo "<ul>";
            foreach ($month as $m) {
                echo "<li>" . $m . "</li>";
            }
            echo "</ul>";
            ?>
        </div>

        <!-- Exercise 4 -->
        <div class="exercise-section">
            <h2>Exercise 4: Associative Array</h2>
            <?php
            // 4.a) Associative Array
            $monthDays = array(
                'January'   => 31,
                'February'  => 28, // Assuming non-leap year
                'March'     => 31,
                'April'     => 30,
                'May'       => 31,
                'June'      => 30,
                'July'      => 31,
                'August'    => 31,
                'September' => 30,
                'October'   => 31,
                'November'  => 30,
                'December'  => 31
            );

            // 4.b) Loop that prints a table of days in each month
            echo "<h3>Exercise 4b: Days in Each Month</h3>";
            echo "<table>";
            echo "<tr><th>Month</th><th>Days</th></tr>";
            foreach ($monthDays as $month => $days) {
                echo "<tr><td>$month</td><td>$days</td></tr>";
            }
            echo "</table>";

            // 4.c) Print all months with 30 days
            echo "<h3>Exercise 4c: Months with 30 Days</h3>";
            echo "<ul>";
            foreach ($monthDays as $month => $days) {
                if ($days == 30) {
                    echo "<li>$month</li>";
                }
            }
            echo "</ul>";
            ?>
        </div>
        
        <!-- Exercise 5 -->
        <div class="exercise-section">
            <h2>Exercise 5: Shortest/Longest String Length</h2>
            <?php
            $strings = array("abcd", "abc", "de", "hjjj", "g", "wer");

            // Map the array to an array of lengths
            $lengths = array_map('strlen', $strings);

            // Find the minimum and maximum lengths
            $shortest = min($lengths);
            $longest = max($lengths);

            echo "<p>Sample Array: <code>" . implode('", "', $strings) . "</code></p>";
            echo "<p>The shortest array length is: <strong>$shortest</strong>.</p>";
            echo "<p>The longest array length is: <strong>$longest</strong>.</p>";
            ?>
        </div>

        <!-- Exercise 6 -->
        <div class="exercise-section">
            <h2>Exercise 6: Numbers Divisible by 4 (200-250)</h2>
            <?php
            // Generate the range of numbers from 200 to 250 with a step of 4
            $numbers = range(200, 250, 4);

            // Display the numbers
            echo "<p>Numbers between 200 and 250 divisible by 4:</p>";
            echo "<p><strong>" . implode(', ', $numbers) . "</strong></p>";
            ?>
        </div>

        <!-- Exercise 7 -->
        <div class="exercise-section">
            <h2>Exercise 7: Temperature Analysis</h2>
            <?php
            $temperatures = array(
                78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75,
                76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64,
                68, 73, 75, 79, 73
            );

            // Calculate average temperature
            $average = array_sum($temperatures) / count($temperatures);
            echo "<p>Average Temperature is: <strong>" . round($average, 1) . "</strong></p>";

            // Sort the temperatures
            sort($temperatures);

            // Get five lowest
            $lowest = array_slice($temperatures, 0, 5);

            // Get five highest
            $highest = array_slice($temperatures, -5, 5);

            echo "<p>List of five lowest temperatures:</p>";
            echo "<ul class='temp-list'><li>" . implode('</li><li>', $lowest) . "</li></ul>";

            echo "<p>List of five highest temperatures:</p>";
            echo "<ul class='temp-list'><li>" . implode('</li><li>', $highest) . "</li></ul>";
            
            echo "<small><em>Note: The PDF's expected output for highest temperatures (76, 78, 79, 81, 85) includes 81, which is not in the source data. The output above (76, 76, 78, 79, 85) is correct based on the provided array.</em></small>";
            ?>
        </div>

    </div>
</body>
</html>