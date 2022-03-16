<?php 
session_start();
ob_start();
include "include/conn.php";

function getRandomHex($num_bytes=4) {
  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}
function mail_checker($email,$conn){
    $sql = "SELECT * FROM user WHERE number='$email'";
    $s = $conn->query($sql);
    $count = mysqli_num_rows($s);
    if ($count>=1) {
      return true;
    }else{
      return false;
    }
  }
if (isset($_POST['register'])) {
  $error = "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $token = mt_rand(1111,9999);

    if(mail_checker($phone,$conn) == true){
        $error = "Number Already Exists!";
    }

if ($password != $cpass) {
    $error = "Passwords Must be Same!";
}
else if(mail_checker($phone,$conn) == false){
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
    $error = "Unable to Send OTP, Please try again Later.";
  } else {
    $sql = "INSERT INTO user (name,email,number,password,balance,status,token,date) VALUES ('$name','$email','$phone','$password','0','0','$token',now())";
    if ($conn->query($sql)) {
        $_SESSION['otp'] = $phone;
        header("location:register.php");
        //$_SESSION['msg'] = "Enter OTP To Verify Your Account";
        //header("Location:index.php");
  } 
  else{
    echo $conn->error;
}
    }
}
}

?>

<?php 
  if (isset($_POST['otpp'])) {
    $num = $_SESSION['otp'];
    $token = $_POST['otp'];
    $s = "select token from user where number = '$num'";
    $r = $conn->query($s);
    $row = mysqli_fetch_assoc($r);
    if($row['token'] == $token){
      $sql = "UPDATE user SET status='1' WHERE token = '$token'";
      if($conn->query($sql)) {
        $_SESSION['msg'] =  "Account Successfully Verified";
        unset($_SESSION['otp']);
        header("location:index.php");
      }
    }
    else{
      $error = "Please Enter Correct OTP";
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
  <title>Register | Network Bidding</title>
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
                <h3>Register</h3>
              </div>
              <?php if(!empty($error)){?>
              <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                <?php echo $error; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php }?>
              <?php if(isset($_SESSION['otp'])){?>
                <br><br>
                <form action="" method="POST">
                <div class="form-group first mb-1">
                  <label for="username">Enter OTP</label>
                  <input type="number" min="4" name="otp" class="form-control" id="username" required>
                </div><br>
                <input type="submit" value="Verify OTP" name="otpp" class="btn btn-block btn-primary">
                </form>
              <?php }else{?>
              <form method="POST" action="">
                <div class="form-group first mb-1">
                  <label for="username">Full Name</label>
                  <input type="text" name="name" class="form-control" id="username" required>
                </div>
                <div class="form-group first mb-1">
                  <label for="username">Email</label>
                  <input type="email" name="email" class="form-control" id="username" required>
                </div>
                <div class="form-group last mb-1">
                  <label for="password">Phone Number</label>
                  <input type="number" name="phone" maxvalue="10" class="form-control" id="password" required>
                </div>
                <div class="form-group last mb-1">
                  <label for="password">Password</label>
                  <input type="password" name="pass" class="form-control" id="password" required>
                </div>
                <div class="form-group last mb-4">
                  <label for="password">Confirm Password</label>
                  <input type="password" name="cpass" class="form-control" id="password" required>
                </div>
                <div class="d-flex mb-3 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Accept Terms and Conditions</span>
                    <input type="checkbox" name="terms" required checked="">
                    <div class="control__indicator"></div>
                    </label>
                </div>
                <input type="submit" value="Register" name="register" class="btn btn-block btn-primary">
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