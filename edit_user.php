<?php 
    session_start();
    require_once "db.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $urole = $_POST['urole'];

        $sql = $conn->prepare("UPDATE crud_admin SET username = :username, first_name = :first_name, last_name = :last_name, email = :email,
        phone = :phone, urole = :urole WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":username", $username);
        $sql->bindParam(":first_name", $first_name);
        $sql->bindParam(":last_name", $last_name);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":phone", $phone);
        $sql->bindParam(":urole", $urole);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: usermanagment.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: usermanagment.php");
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
        <form action="edit_user.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM crud_admin WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID: </label>
                    <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                    <label for="username" class="col-form-label">Username: </label>
                    <input type="text" value="<?php echo $data['username']; ?>" required class="form-control" name="username" >
                </div>
                <div class="mb-3">
                    <label for="first_name" class="col-form-label">First Name: </label>
                    <input type="text" value="<?php echo $data['first_name']; ?>" required class="form-control" name="first_name">
                    <label for="last_name" class="col-form-label">Last Name: </label>
                    <input type="text" value="<?php echo $data['last_name']; ?>" required class="form-control" name="last_name">
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email: </label>
                    <input type="email" value="<?php echo $data['email']; ?>" required class="form-control" name="email">
                    <label for="phone" class="col-form-label">Phone: </label>
                    <input type="text" value="<?php echo $data['phone']; ?>" required class="form-control" name="phone">
                </div>
                <div class="mb-3">
                    <label for="urole" class="col-form-label">User Role:</label>
                        <select class="form-select" name="urole" aria-label="Example select with button addon">
                        <option selected><?php echo $data['urole']; ?></option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <hr>
                <a href="usermanagment.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>
</body>
</html>