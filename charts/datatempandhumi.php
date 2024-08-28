<?php 
header('Content-Type: application/json');

require_once 'db.php';

$startDate = isset($_GET['start']) ? $_GET['start'] : null;
$endDate = isset($_GET['end']) ? $_GET['end'] : null;

$sqlQuery = "SELECT * FROM logdata";

if ($startDate && $endDate) {
    $sqlQuery .= " WHERE DATE(reading_time) BETWEEN '$startDate' AND '$endDate'";
}

$sqlQuery .= " ORDER BY reading_time";

$result = mysqli_query($conn, $sqlQuery);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>

