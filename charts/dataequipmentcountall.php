<?php
    header('Content-Type: application/json');

    require_once 'db.php';

    $sqlQuery = "SELECT equipment, 
                        CASE 
                            WHEN status = 'OFF' THEN 0
                            WHEN status = 'ON' THEN 1
                            WHEN status = 'NO ACTION NEEDED' THEN 2
                        END AS status,
                        COUNT(*) AS count_status
                FROM logdata
                GROUP BY equipment, status
                ORDER BY equipment, status";

    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);
?>
