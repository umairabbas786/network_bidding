<?php
session_start();
ob_start();
include "include/conn.php";
$msg = "";
$msg2 = "";
if (isset($_POST['reset'])) {
    $phone = $_POST['phone'];
    $sql = "SELECT * FROM user WHERE number='$phone'";
    $r = $conn->query($sql);
    $count = mysqli_num_rows($r);
    if ($count>=1) {
        $_SESSION['reset'] = '1';
        $msg2 = "Verify that its you!";
    }
    else{
        $msg = "Please Enter Correct Information";
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
  <title>Forget Password | Network Bidding</title>
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
              <div class="mb-5">
                <h3>Forget Password</h3>
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
              <?php if(isset($_SESSION['reset'])){?>
                <form action="" method="POST">
                    <div class="form-group first mb-3">
                        <label for="username">Verify Otp</label>
                        <input type="number" name="otp" class="form-control" required>
                    </div>
                    <input type="submit" value="Submit Otp" name="otp" class="btn btn-block btn-primary">
                </form>
            <?php }else{?>
              <form action="" method="post">
                <div class="form-group first mb-3">
                  <label for="username">Phone Number</label>
                  <input type="number" name="phone" class="form-control" required>
                </div>
                <input type="submit" value="Reset Password" name="reset" class="btn btn-block btn-primary">
              </form>
              <?php }?>
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