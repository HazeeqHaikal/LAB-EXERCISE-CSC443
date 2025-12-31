<?php
/**
 * Comprehensive Chart.js Report Dashboard
 * This file combines the database connection, data fetching, 
 * and multiple visualization types into a single file.
 */

// 1. Database Connection
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "demodb";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    $error_msg = "Database connection failed: " . mysqli_connect_error();
    $use_fallback = true;
} else {
    $use_fallback = false;
    // 2. Fetch Data from tbl_marks
    $sqlQuery = "SELECT student_name, marks FROM tbl_marks ORDER BY student_name";
    $result = mysqli_query($conn, $sqlQuery);

    $labels = [];
    $dataPoints = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['student_name'];
            $dataPoints[] = $row['marks'];
        }
    } else {
        $use_fallback = true;
    }
    mysqli_close($conn);
}

// 3. Fallback Data (if DB is empty or connection fails)
if ($use_fallback) {
    $labels = ["Ali", "Kamal", "Siti", "Zaleha", "Musa"];
    $dataPoints = [39, 46, 65, 90, 75];
}

// Color palette for charts
$colors = ["#49e2ff", "#ff6384", "#ffcd56", "#4bc0c0", "#9966ff", "#ff9f40"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance Dashboard</title>
    <!-- Chart.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .chart-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .chart-card h3 {
            margin-top: 0;
            text-align: center;
            color: #555;
            font-size: 1.1em;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .status-msg {
            max-width: 1200px;
            margin: 0 auto 20px auto;
            padding: 10px;
            background: #fff3cd;
            border-left: 5px solid #ffecb5;
            color: #856404;
            border-radius: 4px;
        }
        @media (max-width: 500px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Student Performance Dashboard</h1>
        <p>Visualizing exam results across multiple chart formats</p>
    </div>

    <?php if (isset($error_msg)): ?>
        <div class="status-msg">
            <strong>Notice:</strong> <?php echo $error_msg; ?>. Displaying sample data for preview.
        </div>
    <?php endif; ?>

    <div class="dashboard-grid">
        <!-- 1. Bar Chart -->
        <div class="chart-card">
            <h3>Vertical Bar Chart</h3>
            <canvas id="barChart"></canvas>
        </div>

        <!-- 2. Line Chart -->
        <div class="chart-card">
            <h3>Line Chart (Trends)</h3>
            <canvas id="lineChart"></canvas>
        </div>

        <!-- 3. Pie Chart -->
        <div class="chart-card">
            <h3>Pie Chart (Distribution)</h3>
            <canvas id="pieChart"></canvas>
        </div>

        <!-- 4. Doughnut Chart -->
        <div class="chart-card">
            <h3>Doughnut Chart</h3>
            <canvas id="doughnutChart"></canvas>
        </div>

        <!-- 5. Horizontal Bar Chart -->
        <div class="chart-card">
            <h3>Horizontal Bar Chart</h3>
            <canvas id="horizontalBarChart"></canvas>
        </div>
    </div>

    <script>
        // Data from PHP
        const labels = <?php echo json_encode($labels); ?>;
        const dataValues = <?php echo json_encode($dataPoints); ?>;
        const colors = <?php echo json_encode($colors); ?>;

        // Shared Options
        const commonOptions = {
            responsive: true,
            legend: { display: false },
            scales: {
                yAxes: [{ ticks: { beginAtZero: true, max: 100 } }]
            }
        };

        // 1. Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Marks',
                    data: dataValues,
                    backgroundColor: colors[0]
                }]
            },
            options: commonOptions
        });

        // 2. Line Chart
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Marks',
                    data: dataValues,
                    borderColor: colors[1],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: commonOptions
        });

        // 3. Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: colors
                }]
            },
            options: { responsive: true, legend: { position: 'bottom' } }
        });

        // 4. Doughnut Chart
        new Chart(document.getElementById('doughnutChart'), {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: colors
                }]
            },
            options: { responsive: true, legend: { position: 'bottom' } }
        });

        // 5. Horizontal Bar Chart
        new Chart(document.getElementById('horizontalBarChart'), {
            type: 'horizontalBar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Marks',
                    data: dataValues,
                    backgroundColor: colors[4]
                }]
            },
            options: {
                responsive: true,
                legend: { display: false },
                scales: {
                    xAxes: [{ ticks: { beginAtZero: true, max: 100 } }]
                }
            }
        });
    </script>
</body>
</html>