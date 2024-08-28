<?php 
session_start();
require_once "db.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $urole = $_POST['urole'];

    if (empty($username)) {
        $_SESSION['error'] = "Please enter your username.";
        header("location: usermanagment.php");
    } elseif (strlen($_POST['username']) > 12 || strlen($_POST['username']) < 6) {
        $_SESSION['error'] = "The length of the username must be 6 to 12 characters.";
        header("location: usermanagment.php");
    } elseif (!preg_match('/[a-z]+/', $username) || !preg_match('/[A-Z]+/', $username)) {
        $_SESSION['error'] = "Username must contain at least one lowercase and one uppercase letter.";
        header("location: usermanagment.php");
    } elseif (preg_match("/[\/\-\\'\"\<>\.,()_=+*&฿^%$#@!`~]+/", $username)) {
        $_SESSION['error'] = "Username must not contain special characters.";
        header("location: usermanagment.php");
    } elseif (preg_match('/\s/', $username)) {
        $_SESSION['error'] = "Username must not contain spaces.";
        header("location: usermanagment.php");
    } elseif (!preg_match('/[0-9]+/', $username)) {
        $_SESSION['error'] = "Username must contain at least one digit.";
        header("location: usermanagment.php");
    } elseif (empty($first_name)) {
        $_SESSION['error'] = "Please enter your firstname.";
        header("location: usermanagment.php");
    } elseif (preg_match('/\s/', $first_name)) {
        $_SESSION['error'] = "Firstname must not contain spaces.";
        header("location: usermanagment.php");
    } elseif (preg_match('/[0-9]+/', $first_name)) {
        $_SESSION['error'] = "Firstname must not contain digits.";
        header("location: usermanagment.php");
    } elseif (preg_match("/[\/\-\\'\"\<>\.,()_=+*&฿^%$#@!`~]+/", $first_name)) {
        $_SESSION['error'] = "Firstname must not contain special characters.";
        header("location: usermanagment.php");
    } elseif (empty($last_name)) {
        $_SESSION['error'] = "Please enter your lastname.";
        header("location: usermanagment.php");
    } elseif (preg_match('/\s/', $last_name)) {
        $_SESSION['error'] = "Lastname must not contain spaces.";
        header("location: usermanagment.php");
    } elseif (preg_match('/[0-9]+/', $last_name)) {
        $_SESSION['error'] = "Lastname must not contain digits.";
        header("location: usermanagment.php");
    } elseif (preg_match("/[\/\-\\'\"\<>\.,()_=+*&฿^%$#@!`~]+/", $last_name)) {
        $_SESSION['error'] = "Lastname must not contain special characters.";
        header("location: usermanagment.php");
    } elseif (empty($email)) {
        $_SESSION['error'] = "Please enter your email.";
        header("location: usermanagment.php");
    } elseif (preg_match('/\s/', $email)) {
        $_SESSION['error'] = "Email must not contain spaces.";
        header("location: usermanagment.php");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("location: usermanagment.php");
    }  elseif (empty($phone)) {
        $_SESSION['error'] = "Please enter your Phone Number .";
        header("location: usermanagment.php");
    } elseif (!preg_match('/^\d{10}$/', $phone) || substr($phone, 0, 1) != '0') {
        $_SESSION['error'] = "Phone Number  must start with 0 and contain 10 digits.";
        header("location: usermanagment.php");
    } elseif (preg_match("/[\/\-\\'\"\<>\.,()_=+*&฿^%$#@!`~]+/", $phone)) {
        $_SESSION['error'] = "Phone Number must not contain special characters.";
        header("location: usermanagment.php");
    } elseif (preg_match('/\D/', $phone)) {
        $_SESSION['error'] = "Phone Number must not contain letters or spaces.";
        header("location: usermanagment.php");
    } elseif (empty($password)) {
        $_SESSION['error'] = "Please enter your password.";
        header("location: usermanagment.php");
    }  elseif (strlen($_POST['password']) > 16 || strlen($_POST['password']) < 8) {
        $_SESSION['error'] = "The password must be between 8 and 16 characters long.";
        header("location: usermanagment.php");
    }  elseif (!preg_match("/[a-z]+/", $password) || !preg_match("/[A-Z]+/", $password)) {
        $_SESSION['error'] = "Password must contain at least one lowercase and one uppercase letter.";
        header("location: usermanagment.php");
    }  elseif (!preg_match("/[\/\-\\'\"\<>\.,()_=+*&฿^%$#@!`~]+/", $password)) {
        $_SESSION['error'] = "Password must contain at least one special character.";
        header("location: usermanagment.php");
    } elseif (preg_match('/\s/', $password)) {
        $_SESSION['error'] = "Password must not contain spaces.";
        header("location: usermanagment.php");
    }  elseif (empty($c_password)) {
        $_SESSION['error'] = "Please enter your confirm password.";
        header("location: usermanagment.php");
    }   elseif ($password != $c_password) {
        $_SESSION['error'] = "Password mismatch.";
        header("location: usermanagment.php");
    } else {
        try {
            $check_username = $conn->prepare("SELECT username FROM crud_admin WHERE username = :username");
            $check_username->bindParam(":username", $username);
            $check_username->execute();
            $row1 = $check_username->fetch(PDO::FETCH_ASSOC);

            $check_email = $conn->prepare("SELECT email FROM crud_admin WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row2 = $check_email->fetch(PDO::FETCH_ASSOC);

            $check_phone = $conn->prepare("SELECT phone FROM crud_admin WHERE phone = :phone");
            $check_phone->bindParam(":phone", $phone);
            $check_phone->execute();
            $row3 = $check_phone->fetch(PDO::FETCH_ASSOC);

            if ($row1['username'] == $username) {
                $_SESSION['warning'] = "This username is already in use. Click here to <a href=sign.php>Sign In</a>";
                header("location: usermanagment.php");
            } elseif ($row2['email'] == $email) {
                $_SESSION['warning'] = "This email is already in use. Click here to <a href=sign.php>Sign In</a>";
                header("location: usermanagment.php");
            } elseif ($row3['phone'] == $phone) {
                $_SESSION['warning'] = "This phone is already in use. Click here to <a href=sign.php>Sign In</a>";
                header("location: usermanagment.php");
            } elseif (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO crud_admin(username, first_name, last_name, email, phone, password, urole)
                                        VALUES(:username, :first_name, :last_name, :email, :phone, :password, :urole)");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":first_name", $first_name);
                $stmt->bindParam(":last_name", $last_name);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":phone", $phone);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();
            } else {
                $_SESSION['error'] = "Somthing's Wrong";
                header("location: usermanagment.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>