<?php
    header('Content-Type: application/json');

    require_once 'db.php';

    $sqlQuery = "SELECT location, mushroom, 
                        SUM(weight) AS total_weight
                FROM crud_product
                GROUP BY location, mushroom
                ORDER BY location, mushroom";

    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);
?>
