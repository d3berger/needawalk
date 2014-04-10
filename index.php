<?php
session_start();
$token = hash('sha256', 'needawalk'.time());
$_SESSION['CSRFToken'] = $token;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Need a walk</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="jquery.form.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#signupForm").validate();
            $("#signupForm").ajaxForm({
                target: '#output'
            });
        });
    </script>
</head>
<body>
    <div class="heading">Please signup below for more information</div>
    <form id="signupForm" class="signup" method="POST" action="post.php">
        <input type="hidden" name="CSRFToken" value="<?php echo $token; ?>" />
        <div>
                <label class="title">Name</label>
                <input type="text" name="name" placeholder="First and Last name" required />
        </div>
        <div>
                <label class="title">Email</label>
                <input type="email" name="email" placeholder="Email Address" required />
        </div>
        <div>
                <label class="title">Interest</label>
                <label><input type="radio" name="interest" value="1" required /> Owner</label>
                <label><input type="radio" name="interest" value="2" required /> Walker</label>
                <label><input type="radio" name="interest" value="3" required /> Both</label>
        </div>
        <div>
                <label class="title">State</label>
                <input type="text" name="state" placeholder="State" />
        </div>
        <div>
                <label class="title">City</label>
                <input type="text" name="city" placeholder="City" />
        </div>
        <div>
                <label class="title">Zip</label>
                <input type="text" name="zip" placeholder="Zip / Postal Code" />
        </div>
        <div class="submit">
                <input type="submit" name="submit" />
        </div>
        <div id="output"></div>
    </form>
</body>
</html>
