<?php 
session_start();
ob_start();
include "include/conn.php";

function getRandomHex($num_bytes=4) {
  return bin2hex(openssl_random_pseudo_bytes($num_bytes));
}
function mail_checker($email){
    include'include/db.php';
    $sql = "SELECT * FROM user WHERE email='$email'";
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
    $token = getRandomHex(30);

    if(mail_checker($email) == false){
        $error = "Email Already Exists!";
    }

if ($password != $cpass) {
    $error = "Passwords Must be Same!";
}
else{
    $sql = "INSERT INTO user (name,email,number,password,status,token,date) VALUES ('$name','$email','$phone','$password','0','$token',now())";
    if ($conn->query($sql)) {
    $user_id = $conn->insert_id;
    $sql = "INSERT INTO user_wallet (user_id,wallet_balance,withdraw_balance,account_id) VALUES('$user_id','0','0','$account_id')";
    $conn->query($sql);

    $to = $email;
    $subject = "Euro Wallet Payments Email Verification";
    $from = 'support@eurowalletpayments.com';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$variables = array();

$variables['email'] = $email;
$variables['token'] = $token;

$template = file_get_contents("mail_template.php");

foreach($variables as $key => $value)
{
  $template = str_replace('{{'.$key.'}}', $value, $template);
}

$message =  $template;
 if(mail($to, $subject, $message, $headers)){
    $_SESSION['msg'] = "Check Your Email To Verify Your Account";
    header("Location:index.php");
 }
        
    }
    else{
        echo $conn->error;
    }
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
              <form method="POST" action="">
                <div class="form-group first mb-1">
                  <label for="username">Full Name</label>
                  <input type="text" name="name" class="form-control" id="username">
                </div>
                <div class="form-group first mb-1">
                  <label for="username">Email</label>
                  <input type="email" name="email" class="form-control" id="username">
                </div>
                <div class="form-group last mb-1">
                  <label for="password">Phone Number</label>
                  <input type="number" name="phone" class="form-control" id="password" required>
                </div>
                <div class="form-group last mb-1">
                  <label for="password">Password</label>
                  <input type="password" name="pass" class="form-control" id="password" >
                </div>
                <div class="form-group last mb-4">
                  <label for="password">Confirm Password</label>
                  <input type="password" name="cpass" class="form-control" id="password" >
                </div>
                <div class="d-flex mb-3 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Accept Terms and Conditions</span>
                    <input type="checkbox" name="terms" required checked="">
                    <div class="control__indicator"></div>
                    </label>
                </div>
                <div id="recaptcha-container"></div><br>
                <input type="submit" value="Register" name="register" class="btn btn-block btn-primary">
              </form>
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