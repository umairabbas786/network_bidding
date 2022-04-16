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
      $token = mt_rand(1111,9999);
      $fields = array(
        "sender_id" => "Number Bidding",
        "variables_values" => "Use otp: $token to verify your account.",
        "route" => "otp",
        "numbers" => "$phone",
        "flash" => "0",
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($fields),
      CURLOPT_HTTPHEADER => array(
        "authorization: gZzHKm0vLnRr8Jl6NyBIU9YTqhDSjtCsa7OE1oubPd3ceiQwF4lCTNDyReitOFgXoIjQxp9KLG3uZawz",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      $msg = "Unable to Send OTP, Please try again Later.";
    } else {
        $s = "update user set token = '$token' where number = '$phone'";
        if($conn->query($s)){
          $_SESSION['reset'] = '1';
          $_SESSION['phone'] = $phone;
          $msg2 = "Verify that its you!";
        }
        else{
          $msg = "Server issue, Try Again Later";
        }
    }
  }
    else{
        $msg = "Please Enter Correct Information";
    }
}

if(isset($_POST['otp'])){
  $phone = $_POST['phone'];
  $otp = $_POST['ootp'];
  $sql = "select token from user where number = '$phone'";
  $r = $conn->query($sql);
  $row = mysqli_fetch_assoc($r);
  $token = $row['token'];
  if($token == $otp){
    $_SESSION['newpass'] = '1';
  }
  else{
    $msg = "Please Enter Correct Otp";
  }

}

if(isset($_POST['resetpass'])){
  $phone = $_POST['phone'];
  $pass = $_POST['passs'];
  $newpass = $_POST['passss'];
  if($pass == $newpass){
    $sql = "update user set password = '$pass' where number = '$phone'";
    if($conn->query($sql)){
      $_SESSION['msg'] = "Password Changed";
      header("location:index.php");
    }
  }
  else{
    $msg = "Both Passwords must be same";
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
              <?php if(isset($_SESSION['newpass'])){?>
                <form action="" method="POST">
                  <input type="hidden" name="phone" value="<?php echo $_SESSION['phone'];?>">
                    <div class="form-group first mb-3">
                        <label for="username">New Password</label>
                        <input type="password" name="passs" class="form-control" required>
                    </div>
                    <div class="form-group first mb-3">
                        <label for="username">Retype New Password</label>
                        <input type="password" name="passss" class="form-control" required>
                    </div>
                    <input type="submit" value="Reset Password" name="resetpass" class="btn btn-block btn-primary">
                </form>
              <?php }else if(isset($_SESSION['reset'])){?>
                <form action="" method="POST">
                  <input type="hidden" name="phone" value="<?php echo $_SESSION['phone'];?>">
                    <div class="form-group first mb-3">
                        <label for="username">Verify Otp</label>
                        <input type="number" name="ootp" class="form-control" required>
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