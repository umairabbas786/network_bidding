<?php 
include "include/conn.php";



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/fonts/icomoon/style.css">
  <link rel="stylesheet" href="public/css/owl.carousel.min.css">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <title>Login | Network Bidding</title>
</head>
<body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="public/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Login</h3>
              </div>
              <form action="#" method="post">
                <div class="form-group first mb-1">
                  <label for="username">Email</label>
                  <input type="email" name="phone" class="form-control" id="email">
                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" name="pass" class="form-control" id="password">
                </div>

                <div class="d-flex mb-5 align-items-center">
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>
                <input type="submit" value="Log In" name="login" class="btn btn-block btn-primary">
              </form>
              <a href="register.php" style="text-decoration: none;"><button class="btn btn-block btn-primary mt-2">Register</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="public/js/jquery-3.3.1.min.js"></script>
  <script src="public/js/popper.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/main.js"></script>
</body>

</html>