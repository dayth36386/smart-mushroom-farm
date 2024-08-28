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
    <h2>Statistics For Each Mushroom House</h2>
    <div class="chart-container">
        <canvas id="houseproduct"></canvas>
    </div>
</div>

<script>
    let myChart;

    function fetchData() {
        const startDate = document.getElementById('start-date').value;
        const endDate = document.getElementById('end-date').value;
        fetch(`charts/dataproducts.php?start=${startDate}&end=${endDate}`)
            .then(response => response.json())
            .then(data => {
                renderChart(data);
            });
    }

    function renderChart(data) {
        const dates = [];
        const varietiesData = {};

        data.forEach(entry => {
            const date = entry.date;
            if (!dates.includes(date)) {
                dates.push(date);
            }
            if (!varietiesData[entry.mushroom]) {
                varietiesData[entry.mushroom] = {};
            }
            varietiesData[entry.mushroom][date] = entry.total_weight;
        });

        const datasets = [];
        Object.entries(varietiesData).forEach(([variety, dateWeights]) => {
            const totalWeights = dates.map(date => dateWeights[date] || 0);
            datasets.push({
                label: variety,
                data: totalWeights,
                backgroundColor: getRandomColor(),
                borderWidth: 1
            });
        });

        const ctx = document.getElementById('myChart').getContext('2d');

        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: datasets
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

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Initial fetch
    fetchData();
</script>

<script>
    fetch('charts/datahouse.php')
        .then(response => response.json())
        .then(data => {
            const locations = [];
            const varieties = [];
            const weights = [];

            data.forEach(entry => {
                if (!locations.includes(entry.location)) {
                    locations.push(entry.location);
                }
                if (!varieties.includes(entry.mushroom)) {
                    varieties.push(entry.mushroom);
                }
                weights.push({ location: entry.location, mushroom: entry.mushroom, weight: entry.total_weight });
            });

            const datasets = [];
            locations.forEach(location => {
                const dataPoints = varieties.map(variety => {
                    const weightData = weights.find(weight => weight.location === location && weight.mushroom === variety);
                    return weightData ? weightData.weight : 0;
                });
                datasets.push({
                    label: location,
                    data: dataPoints,
                    backgroundColor: getRandomColor(),
                    borderWidth: 1
                });
            });

            const ctx = document.getElementById('houseproduct').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: varieties,
                    datasets: datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>