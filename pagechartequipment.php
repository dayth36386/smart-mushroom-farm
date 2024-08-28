<?php
  session_start();
  require_once 'db.php';
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
   <title>Visualization Equipment Working Status</title>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
   <!--=============== historypage ===============-->
   <link rel="stylesheet" href="assets/css/test.css">
   <style>
        body{
          background-color:white;
        }
        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .filter-container label {
            margin: 0 10px;
            font-weight: bold;
        }

        .filter-container input[type="date"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .filter-container button {
            margin-left: 10px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .filter-container button:hover {
            background-color: #0056b3;
        }
        h2{
            margin:5px;
            color:rgb(24, 24, 24);
        }
        @media screen and (max-width:600px){
        .ctn {
            flex-direction: column;
            align-items: center;
        }

        .box1 {
            width: 100%;
            margin-bottom: 20px;
        }

        .box2 {
            width: 100%;
        }

        .sbox1 {
            width: 100%;
        }
        /* เพิ่ม CSS สำหรับตัวกรอง */
        .filter-container {
            flex-direction: column;
            align-items: center;
        }

        .filter-container label {
            margin: 10px 0;
        }

        .filter-container input[type="date"],
        .filter-container button {
            width: 100%;
            margin: 5px 0;
        }

        .chart-container {
            width: 100%;
            height: auto;
            margin-right: 0;
        }
        h2{
            margin: 25px;
            color:rgb(24, 24, 24);
        }
    }
    @media only screen and (min-width: 992px) {
            .chart-container {
            display: inline-block;
            width: 45%;
            margin-right: 10px;
        }

        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        .chart-container{
            width: 100vw;
            height: calc(100vh - 40px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5%;
            
        }
        .ctnchart{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        }
        @media (orientation: landscape) {
            .sbox1{
                margin-top:2vw;
            }
        }
    </style>
</head>
<?php include 'header.php'; ?>
<body>
  <div class="ctn">
    <div class="box1">
      <video src="img/AdobeStock_235927650.mov" autoplay loop muted></video>
      <div class="text-overlay">
        <h1>Visualization Equipment Working Status</h1>
      </div>
    </div>
    <div class="box2">
      <div class="sbox1">
        <?php include 'charts/chartequipment.php'; ?>
      </div> 
    </div>
  </div>
</body>
</html>
