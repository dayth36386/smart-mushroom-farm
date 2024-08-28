<?php 
    // Set the header content type to JSON
    header('Content-Type: application/json');

    // Include database connection file
    require_once 'db.php';

    // Initialize variables to store start and end dates
    $startDate = $_GET['start'] ?? null;
    $endDate = $_GET['end'] ?? null;

    // SQL query to fetch data from the logdata table
    $sqlQuery = "SELECT DATE(reading_time) AS date,
                        equipment,
                        COUNT(*) AS total_on_count
                FROM logdata
                WHERE status = 'ON'"; // Filter by status 'ON'

    // Add WHERE clause to filter by date if start and end dates are provided
    if ($startDate && $endDate) {
        $sqlQuery .= " AND DATE(reading_time) BETWEEN '$startDate' AND '$endDate'";
    }

    $sqlQuery .= " GROUP BY DATE(reading_time), equipment
                ORDER BY DATE(reading_time), equipment";

    // Execute the query
    $result = mysqli_query($conn, $sqlQuery);

    // Initialize an array to store the data
    $data = array();

    // Loop through the result set and store each row in the data array
    while ($row = mysqli_fetch_assoc($result)) {
        // Add the total_on_count to the corresponding date and equipment
        $data[$row['date']][$row['equipment']] = $row['total_on_count'];
    }

    // Close the database connection
    mysqli_close($conn);

    // Encode the data array into JSON format and echo it
    echo json_encode($data);
?>
