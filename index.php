<?php
  session_start();
  require_once 'db.php';
  if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
      $_SESSION['error'] = "Please log in.";
      header("location: signin.php");
  }

  $isAdmin = false;
  if (isset($_SESSION['admin_login'])) {
      $admin_id = $_SESSION['admin_login'];
      $stmt = $conn->query("SELECT * FROM crud_admin WHERE id = $admin_id");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $isAdmin = true;
  } elseif (isset($_SESSION['user_login'])) {
      $user_id = $_SESSION['user_login'];
      $stmt = $conn->query("SELECT * FROM crud_admin WHERE id = $user_id");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $isAdmin = false;
  }

  $_SESSION['is_admin'] = $isAdmin;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>index</title>
   <!--=============== ICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-thin-straight/css/uicons-thin-straight.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-brands/css/uicons-brands.css'>
   <!--=============== CSS ===============-->
   <!--=============== navbar ===============-->
   <link rel="stylesheet" href="assets/css/styles.css">
   <!--=============== homepage ===============-->
   <link rel="stylesheet" href="assets/css/homepage.css">
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="ctn">
    <div class="box1">
      <video src="img/AdobeStock_482911027.mov" autoplay loop muted></video>
      <div class="text-overlay">
        <h1>Welcome</h1>
        <h2>"<?php echo $row ['first_name']?>"</h2>
      </div>
    </div>
    <div class="box2">
    </div>
  </div>
</body>
</html>