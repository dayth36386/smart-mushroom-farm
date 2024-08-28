<?php
    session_start();
    require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="mt-4">Register</h3>
        <hr>
        <form action="signup_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['waring'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                        echo $_SESSION['waring'];
                        unset($_SESSION['waring']);
                    ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="username">
                <div id="emailHelp" class="form-text">The length of the username must be 6 to 12 characters.</div>
                <div id="emailHelp" class="form-text">Username must contain at least one lowercase and one uppercase letter.</div>
                <div id="emailHelp" class="form-text">Username must not contain spaces and special characters.</div>
                <div id="emailHelp" class="form-text">Username must contain at least one digit.</div>
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" aria-describedby="first_name">
                <div id="emailHelp" class="form-text">Firstname must not contain spaces, digits and special characters.</div>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" aria-describedby="last_name">
                <div id="emailHelp" class="form-text">Lastname must not contain spaces, digits and special characters.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" aria-describedby="email">
                <div id="emailHelp" class="form-text">Email must not contain spaces.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" aria-describedby="phone">
                <div id="emailHelp" class="form-text">The Phone Number must not contain with "-".</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <div id="emailHelp" class="form-text">The password must be between 8 and 16 characters long.</div>
                <div id="emailHelp" class="form-text">Password must contain at least one lowercase and one uppercase letter.</div>
                <div id="emailHelp" class="form-text">Password must contain at least one special character.</div>
            </div>
            <div class="mb-3">
                <label for="confrim password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>
        <hr>
        <p>Already a member? Click here to <a href="signin.php">Sign In</a></p>
    </div>
</body>
</html>