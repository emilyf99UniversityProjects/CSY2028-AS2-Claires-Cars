<?php
	require 'databasejoin.php';

	$content = '';
	$title = 'Claires\'s Cars - Admin';
	$class = 'admin';
	require '../templates/layout.html.php';

	
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == 'opensesame') {
			$_SESSION['loggedin'] = true;	
		}
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

		$content = '<h2>You are now logged in</h2>';
	
	}

	else {
		$content =
		loadTemplate('../templates/loginform.html.php');
	}
	?>
	

