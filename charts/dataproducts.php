<?php
header('Content-Type: application/json');

require_once 'db.php';

$startDate = isset($_GET['start']) ? $_GET['start'] : null;
$endDate = isset($_GET['end']) ? $_GET['end'] : null;

$sqlQuery = "SELECT mushroom,
                    DATE(created_at) AS date,
                    SUM(weight) AS total_weight
             FROM crud_product";

if ($startDate && $endDate) {
    $sqlQuery .= " WHERE DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
}

$sqlQuery .= " GROUP BY mushroom, DATE(created_at)
               ORDER BY mushroom, DATE(created_at)";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
