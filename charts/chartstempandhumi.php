    <div class="ctnchart">
        <div class="filter-container">
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date">
            <label for="end-date">End Date:</label>
            <input type="date" id="end-date">
            <button onclick="handleFilter()">Filter</button>
        </div>

        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script>
        let myChart;

        // Fetch all data initially
        fetchData();

        function fetchData() {
            fetch('charts/datatempandhumi.php')
                .then(response => response.json())
                .then(data => {
                    renderChart(data);
                });
        }

        function renderChart(data) {
            // Extract data from JSON
            const timestamps = data.map(entry => entry.reading_time);
            const temValues = data.map(entry => entry.value1);
            const humiValues = data.map(entry => entry.value2);

            // Chart configuration
            const ctx = document.getElementById('myChart').getContext('2d');

            // If chart already exists, destroy it before creating a new one
            if (myChart) {
                myChart.destroy();
            }

            myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: timestamps,
                    datasets: [{
                        label: 'Temperature (°C)',
                        data: temValues,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Humidity (%)',
                        data: humiValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            type: 'time',
                            time: {
                                unit: 'day' // Adjust the time scale unit as needed
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        // Function to handle filter button click
        function handleFilter() {
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;
            fetch(`charts/datatempandhumi.php?start=${startDate}&end=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    renderChart(data);
                });
        }
    </script>
