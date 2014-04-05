<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit;
}

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['interest'])) {
    echo 'There was an error processing your request. Please try again.';
    exit;
}

try {
    $dbh = new PDO("mysql:dname=dogs;host=localhost", 'dogs_user', 'dogwalker22');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$q = <<<Q
INSERT INTO `dogs`.`signup` 
(`name`, `email`, `interest`, `state`, `city`, `zip`) 
VALUES 
(:name, :email, :interest, :state, :city, :zip)
Q;

$sth = $dbh->prepare($q);
$data = array();
$r = $sth->execute(array('name' => $_POST['name'],
    'email'=>$_POST['email'],
    'interest' => $_POST['interest'],
    'state' => $_POST['state'],
    'city' => $_POST['city'],
    'zip' => $_POST['zip']));

if ($r === true) {
    echo 'We received your request. Thank you.';
} else {
    echo 'Please try again';
}


