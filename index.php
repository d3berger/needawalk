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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
      color: #fff;
      background-color: #123456;
      border-color: #123456;
    }
    .fifty {
      width: 49%;
      float: left;
    }
    input.form-control {
      margin: 10px 0px 10px 0px;
    }
    input.error {
      border: 1px solid #FF0000 !important
    }
    .form-signup {
      max-width: 400px;
      margin: 0 auto 30px auto;
    }
    .center {
      width: 400px;
      margin: 30px auto 0px auto;
    }
    .space {
      width: 2%;
      float: left;
    }
    .white {
      color: white;
    }
    .red {
      color: red;
    }
    </style>

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
        <input type="text" class="form-control fifty required" name="fname" placeholder="First Name">
        <span class="space">&nbsp;</span>
        <input type="text" class="form-control fifty required" name="lname" placeholder="Last Name">
        <input type="email" class="form-control required email" id="email" name="email" placeholder="Your email address">
        <input type="text" class="form-control required" equalTo="#email" name="emailConfirm" placeholder="Re-enter email address">
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
        

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#signupForm").validate({
              invalidHandler: function(e, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                  var message = errors == 1
                    ? 'You missed 1 field. It has been highlighted below'
                    : 'You missed ' + errors + ' fields.  They have been highlighted below';
                  $("#error").html(message);
                  $("div.error").show();
                } else {
                  $("div.error").hide();
                }
              },
              errorPlacement: function(error,element) {
                return true;
              }
            });
            $("#signupForm").ajaxForm({
                target: '#output'
            });
            $('.btn').button();
        });
    </script>

  </body>
</html>
