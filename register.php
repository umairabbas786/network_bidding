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
              <form>
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
                  <input type="number" id="num" name="phone" class="form-control" id="password" required>
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
                <input type="button" value="Register" name="register" class="btn btn-block btn-primary">
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