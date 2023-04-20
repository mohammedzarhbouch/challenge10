<?php

session_start();
require_once('connection.php');

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../front-end/login/index.html');
	exit;
}

?>

