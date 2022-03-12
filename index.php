<?php
session_start();
ob_start(); 
include "include/conn.php";
$msg = "";
$msg2 = "";
if(isset($_SESSION['logout'])){
  $msg2 = $_SESSION['logout'];
}
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  $sql = "UPDATE user SET status='1' WHERE token = '$token'";
  if($conn->query($sql)) {
    $msg2 =  "Email Successfully Verified";
  }
 }
 if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['pass'];
$sql = "SELECT * FROM user WHERE email='$email'";
$r = $conn->query($sql);
$count = mysqli_num_rows($r);
if ($count>=1) {
while($row = mysqli_fetch_assoc($r)){
   $check_password = $row['password'];
   $email_veification = $row['status'];
   if ($password!=$check_password) {
       $msg = "Please Enter Correct password";
   }else if ($email_veification=='0') {
       $msg = "Please Verify your Email";
   }else{
       $_SESSION['user'] = $email;
       header("Location:user/");
   }
}
}else{
$msg = "Please Enter Correct Details";
}
}

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
              <?php if(!empty($msg)){?>
              <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                <?php echo $msg; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php }?>
              <?php if(!empty($msg2)){?>
              <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                <?php echo $msg2; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php }?>
              <form action="#" method="post">
                <div class="form-group first mb-1">
                  <label for="username">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" name="pass" class="form-control" id="password" required>
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