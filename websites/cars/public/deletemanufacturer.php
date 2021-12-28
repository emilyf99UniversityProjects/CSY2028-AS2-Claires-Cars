<?php

	/*$pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
	session_start();*/

	require 'loadTemplate.php';
	
	$content=  
	'<main class="admin">' .
	loadTemplate('../templates/leftsectionadmin.html.php') .
		'<section class="right">
		</section>
	</main>';
	
	$title ='Claires\'s Cars - Admin';
	require '../templates/layout.html.php';

	/*
	<?php


		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$products = $pdo->query('DELETE FROM manufacturers WHERE id = ' . $_POST['id']);

			echo 'Manufacturer deleted';

		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Username</label>
				<input type="text" name="username" />

				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
		*/
	?>


	
