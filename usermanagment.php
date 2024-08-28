<?php
  session_start();
  if (!isset($_SESSION['user_login']) && !isset($_SESSION['admin_login'])) {
      $_SESSION['error'] = "Please log in.";
      header("location: signin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Managment</title>
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
   <!--=============== productpage ===============-->
   <link rel="stylesheet" href="assets/css/test.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="ctn">
  <?php include 'header.php'; ?>
    <div class="box1">
      <video src="img/AdobeStock_588276184.mov" autoplay loop muted></video>
      <div class="text-overlay">
        <h1>User Managment</h1>
      </div>
    </div>
    <div class="box2">
      <div class="sbox1">
        <?php include 'crudadmin.php'; ?>
      </div> 
    </div>
  </div>
</body>
</html>
