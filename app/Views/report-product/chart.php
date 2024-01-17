<!-- File: app/Views/chart.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart with Chart.js and jQuery</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Sertakan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <canvas id="myBarChart" width="400" height="200"></canvas>

    <script>
        $(document).ready(function() {
            // Gunakan jQuery untuk mengambil data dari controller
            $.ajax({
                url: 'reportProduct/getData',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Gambar bar chart
                    drawBarChart(data);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });

        function drawBarChart(data) {
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Bar Chart Example',
                        data: data.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
