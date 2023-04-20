<?php

session_start();
require_once('connection.php');

if (!isset($_SESSION['loggedin'])) {
	header('Location: /front-end/login/login.html');
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    test test
</body>
</html>