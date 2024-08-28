<?php 

require_once "db.php";

if (isset($_POST['submit'])) {
    $mushroom = $_POST['mushroom'];
    $weight = $_POST['weight'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = $conn->prepare("INSERT INTO crud_product(mushroom, weight, location, description) VALUES (:mushroom, :weight, :location, :description)");
    $sql->bindParam(":mushroom", $mushroom);
    $sql->bindParam(":weight", $weight);
    $sql->bindParam(":location", $location);
    $sql->bindParam(":description", $description);
    $sql->execute();

    if ($sql) {
        $_SESSION['success'] = "Data has been inserted successfully";
        header("location: product.php");
    } else {
        $_SESSION['error'] = "Data has not been inserted successfully";
        header("location: product.php");
    }
}
?>