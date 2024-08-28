<?php 

    $servername = "localhost";
    $username = "u103987334_vwnde";
    $password = "ZX!zx123456";
    $dbname = "u103987334_R9GiO";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


?>