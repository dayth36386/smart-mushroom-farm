<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>
   <!--=============== ICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-thin-straight/css/uicons-thin-straight.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-brands/css/uicons-brands.css'>
   <!--=============== CSS ===============-->
   <!--=============== productpage ===============-->
   <link rel="stylesheet" href="assets/css/test.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--=============== navbar ===============-->
    <link rel="stylesheet" href="assets/css/navbarsup.css">
   <style>
      .sbox1 {
          width: 100%;
          overflow: auto;
          padding: 10px;
          box-sizing: border-box;
      }
      .row{
          box-sizing: border-box;
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
          align-items: center;
          background-color: rgb(255, 255, 255);
          height: auto;
          margin:10px 10px 0px 10px;
          width: 100%;
      }
   </style>
</head>
  <body>
    <!--=============== navbar ===============-->
    <?php include 'navbartwo.php'; ?>
    <div class="ctn">
      <div class="box1">
      <video src="img/AdobeStock_588276184.mov" autoplay loop muted></video>
        <div class="text-overlay">
        <h1>Products</h1>
        </div>
      </div>
        <div class="container mt-5">
            <div class="row">
            <div class="col-md-6 d-flex justify-content-start">
                <h1>Products Management</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add Products</button>
            </div>
        </div>
            </div>
      <div class="box2">
        <div class="sbox1">
            <?php include 'crudproduct.php'; ?>
        </div> 
      </div>
    </div>
  </body>
</html>
