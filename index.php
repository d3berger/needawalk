<?php
session_start();
$token = hash('sha256', 'needawalk'.time());
$_SESSION['CSRFToken'] = $token;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Need a walk</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background-image: url('1920.jpg')">

    <div class="container">
      <div class="center">
        <h1 class="white">Need a walk</h1>
        <h4 class="white">Please fill out this form to register</h4>
        <div id="error" class="red"></div>
      </div>
      <form id="signupForm" class="form-signup" role="form" method="post" action="post.php">
        <input type="hidden" name="CSRFToken" value="<?php echo $token; ?>" />
        <input type="text" class="form-control fifty" name="fname" placeholder="First Name">
        <span class="space">&nbsp;</span>
        <input type="text" class="form-control fifty" name="lname" placeholder="Last Name">
        <input type="email" class="form-control" id="email" name="email" placeholder="Your email address">
        <input type="text" class="form-control" name="emailConfirm" placeholder="Re-enter email address">
        <div class="btn-group btn-group-justified" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" class="required" name="interest" value="1" checked="checked">Dog Owner
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="required" name="interest" value="2">Dog Walker
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="required" name="interest" value="3">Both
          </label>
        </div>
        <input type="text" class="form-control" name="state" placeholder="State / Province / Region">
        <input type="text" class="form-control" name="city" placeholder="City">
        <input type="text" class="form-control" name="zip" placeholder="Zip / Postal Code">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <h4 id="output" class="white"></h4>
      </form>

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

  </body>
</html>
