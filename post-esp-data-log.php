<?php
    $servername = "localhost";
    $username = "u103987334_vwnde";
    $password = "ZX!zx123456";
    $dbname = "u103987334_R9GiO";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $sensor = $location = $value1 = $value2 = $equipment = $status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $sensor = test_input($_POST["sensor"]);
        $location = test_input($_POST["location"]);
        $value1 = test_input($_POST["value1"]);
        $value2 = test_input($_POST["value2"]);
        $equipment = test_input($_POST["equipment"]);
        $status = test_input($_POST["status"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO logdata (`sensor`, `location`, `value1`, `value2`, `equipment`, `status`, `reading_time`) 
                VALUES (?, ?, ?, ?, ?, ?, current_timestamp())";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("ssssss", $sensor, $location, $value1, $value2, $equipment, $status);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
