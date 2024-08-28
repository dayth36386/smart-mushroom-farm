<?php 
    session_start();
    require_once "db.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $mushroom = $_POST['mushroom'];
        $weight = $_POST['weight'];
        $location = $_POST['location'];
        $description = $_POST['description'];

        $sql = $conn->prepare("UPDATE crud_product SET mushroom = :mushroom, weight = :weight, location = :location, description = :description WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":mushroom", $mushroom);
        $sql->bindParam(":weight", $weight);
        $sql->bindParam(":location", $location);
        $sql->bindParam(":description", $description);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: product.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: product.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM crud_product WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID: </label>
                    <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                    <label for="username" class="col-form-label">Mushroom: </label>
                    <select class="form-select" name="mushroom" aria-label="Example select with button addon">
                        <option selected><?php echo $data['mushroom']; ?></option>
                        <option value="เห็ดนางฟ้าภูฐาน">เห็ดนางฟ้าภูฐาน</option>
                        <option value="เห็ดนางรม">เห็ดนางรม</option>
                        <option value="เห็ดนางฟ้า">เห็ดนางฟ้า</option>
                    </select>
                    <label for="weight" class="col-form-label">Weight: </label>
                    <input type="floatval" value="<?php echo $data['weight']; ?>" required class="form-control" name="weight" >
                </div>
                <div class="mb-3">
                    <label for="location" class="col-form-label">Location: </label>
                    <select class="form-select" name="location" aria-label="Example select with button addon">
                        <option selected><?php echo $data['location']; ?></option>
                        <option value="House 1">House 1</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="col-form-label">description: </label>
                    <input type="text" value="<?php echo $data['description']; ?>" class="form-control" name="description">
                </div>
                <hr>
                <a href="product.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>
</body>
</html>