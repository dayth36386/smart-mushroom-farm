<?php
    session_start();
    require_once 'db.php';

    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            $_SESSION['error'] = "Please enter your username.";
            header("location: signin.php");
        }  elseif (empty($password)) {
            $_SESSION['error'] = "Please enter your password.";
            header("location: signin.php");
        } else {
            try {
                $check_data = $conn->prepare("SELECT * FROM crud_admin WHERE username = :username");
                $check_data->bindParam(":username", $username);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {
                    if ($username == $row['username']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['urole'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: index.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: index.php");
                            }
                        } else {
                            $_SESSION['error'] = "The password is incorrect.";
                            header("location: signin.php");
                        }
                    } else {
                        $_SESSION['error'] = "The username is incorrect.";
                        header("location: signin.php");
                    }
                } else {
                    $_SESSION['error'] = "There is no data in the system.";
                    header("location: signin.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>