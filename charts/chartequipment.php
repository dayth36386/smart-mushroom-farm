    <div class="ctnchart">
            <div class="filter-container">
                <label for="start-date">Start Date:</label>
                <input type="date" id="start-date">
                <label for="end-date">End Date:</label>
                <input type="date" id="end-date">
                <button onclick="fetchData()">Filter</button>
            </div>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
            <h2>All Work StatiStics</h2>
            <div class="chart-container">
                <canvas id="equipmentChart"></canvas>
            </div>
    </div>

    <script>
        // Fetch equipment data from PHP script
        fetch('charts/dataequipmentcountall.php')
            .then(response => response.json())
            .then(data => {
                const equipments = [];
                const offCounts = [];
                const onCounts = [];
                const noActionCounts = [];

                data.forEach(entry => {
                    equipments.push(entry.equipment);
                    offCounts.push(entry.status === "0" ? entry.count_status : 0);
                    onCounts.push(entry.status === "1" ? entry.count_status : 0);
                    noActionCounts.push(entry.status === "2" ? entry.count_status : 0);
                });

                const ctx1 = document.getElementById('equipmentChart').getContext('2d');
                const equipmentChart = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: equipments,
                        datasets: [{
                            label: 'OFF',
                            data: offCounts,
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            borderWidth: 1
                        },
                        {
                            label: 'ON',
                            data: onCounts,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderWidth: 1
                        },
                        {
                            label: 'NO ACTION NEEDED',
                            data: noActionCounts,
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });S
    </script>
    <script>
        let myChart;
        // Fetch data from PHP script
        function fetchData() {
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;
            fetch(`charts/dataequipmentdaily.php?start=${startDate}&end=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    renderChart(data);
                });
        }

        // Render chart with data
        function renderChart(data) {
            // Extract dates and equipment counts from JSON data
            const dates = Object.keys(data);
            const fanCounts = [];
            const waterPumpCounts = [];

            // Loop through dates to extract counts for FAN and WATERPUMP
            dates.forEach(date => {
                fanCounts.push(data[date]['FAN'] || 0);
                waterPumpCounts.push(data[date]['WATERPUMP'] || 0);
            });

            // Chart configuration
            const ctx = document.getElementById('myChart').getContext('2d');

            // If chart already exists, destroy it before creating a new one
            if (myChart) {
                myChart.destroy();
            }

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [
                        {
                            label: 'FAN',
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            data: fanCounts
                        },
                        {
                            label: 'WATERPUMP',
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            data: waterPumpCounts
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
        // Initial data fetch
        fetchData();
    </script>