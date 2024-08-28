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
   <title>History</title>
   <!--=============== ICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-thin-straight/css/uicons-thin-straight.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-brands/css/uicons-brands.css'>
   <!--=============== CSS ===============-->
   <!--=============== historypage ===============-->
   <link rel="stylesheet" href="assets/css/test.css">
   <!--=============== log_history.php ===============-->
   <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <!--=============== navbar ===============-->
   <link rel="stylesheet" href="assets/css/navbarsup.css">
   <style>
    @media screen and (max-width: 600px) {
      .text-overlay {
        font-size: 2vw;
        top: 70%;
      }
    }
   </style>
</head>
<body>
  <!--=============== navbar ===============-->
  <?php include 'navbartwo.php'; ?>
  <div class="ctn">
    <div class="box1">
      <video src="img/AdobeStock_271968750.mov" autoplay loop muted></video>
      <div class="text-overlay">
        <h1>Log History</h1>
      </div>
    </div>
    <div class="box2">
      <div class="sbox1">
        <!--=============== log_history.php ===============-->
        <?php include 'log_history.php'; ?>
      </div> 
    </div>
  </div>
</body>
</html>
