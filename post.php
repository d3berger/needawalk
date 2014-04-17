<?php
session_start();

$error = false;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $error = true;
}

if (empty($_POST['fname']) || empty($_POST['email']) || empty($_POST['interest']) || empty($_POST['CSRFToken']) || empty($_SESSION['CSRFToken'])) {
    $error = true;
}

if ($_POST['CSRFToken'] != $_SESSION['CSRFToken'] || strpos($_SERVER['HTTP_REFERER'], 'http://needawalk.com/') === false) {
    $error = true;
}

try {
    require_once('db.php');
    global $dbname, $host, $user, $pass;
    $dbh = new PDO("mysql:dname=$dbname;host=$host", $user, $pass);
} catch (PDOException $e) {
    $error = true;
}

if ($error == true) {
    echo 'There was an error processing your request. Please try again.';
    exit;
}

$insertQuery = <<<QUERY
INSERT INTO `dogs`.`signup` 
(`name`, `email`, `interest`, `state`, `city`, `zip`) 
VALUES 
(:name, :email, :interest, :state, :city, :zip)
QUERY;

$sth = $dbh->prepare($insertQuery);
$result = $sth->execute(array('name' => "{$_POST['fname']} {$_POST['lname']}",
    'email' => $_POST['email'],
    'interest' => $_POST['interest'],
    'state' => $_POST['state'],
    'city' => $_POST['city'],
    'zip' => $_POST['zip']));

if ($result === true) {
    echo 'We received your request. Thank you.';
} else {
    echo 'Sorry that email is already taken.';
}


