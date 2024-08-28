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
    <title>Auto Open Link</title>
    <script type="text/javascript">
        function autoOpenLink() {
            var url = "https://smartmushroomfarm.com/demo_toggle_led.html";
            window.location.href = url;
        }
        window.onload = autoOpenLink;
    </script>
</head>
<body>
</body>
</html>
