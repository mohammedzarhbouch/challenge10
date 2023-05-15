<?php
session_start();

include('connection.php');

if ( !isset($_POST['username'], $_POST['password']) ) {
	
	exit('Please fill both the username and password fields!');
}


if ($statement = $con->prepare('SELECT id, password FROM users WHERE name = ?')) {
	
	$statement->bind_param('s', $_POST['username']);
	$statement->execute();
	$statement->store_result();

	if ($statement->num_rows > 0) {
		$statement->bind_result($id, $password);
		$statement->fetch();
		
	
		if ($_POST['password'] === $password) {
			
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			header('Location: ../front-end/home_profiel/index.html');
		} else {
			var_dump('Incorrect password'); // Debugging statement
			echo 'Incorrect username and/or password!';
		}
	} else {
		
		echo 'Incorrect username and/or password!';
	}

	$statement->close();

	$profiel_pic = $row['profiel_pic'];
	
}
?>