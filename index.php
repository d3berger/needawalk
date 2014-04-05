<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Dog walkers signup form</title>
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

    <style type="text/css">
    form.signup
    {
        background-color: #f3f3f3;
        border: solid 1px #a1a1a1;
        padding: 10px;
        width: 300px;
    }
    
    form.signup input[type=text]
    {
        width: 150px;
        margin-bottom: 10px;
    }
 
    label {
        float: left;
        margin-bottom: 10px;
    }

    label.title
    {
        text-align: right;
        padding-right: 20px;
        width: 70px;
    }

    label.error {
        padding-left: 90px;
        color: red;
    }

    .heading {
        font-size: 18px;
        padding: 10px;
    }

    div {
        clear: both;
    }

    div.submit {
        text-align: right;
    }

    #output {
        color: green;
        padding: 10px;
    }

    </style>
</head>
<body>
    <div class="heading">Please signup below for more information</div>
    <form id="signupForm" class="signup" method="POST" action="post.php">
    <div>
            <label class="title">Name</label>
            <input type="text" name="name" placeholder="User Name" required />
    </div>
    <div>
            <label class="title">Email</label>
            <input type="text" name="email" placeholder="Email Address" required />
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
