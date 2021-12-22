<?php

	/*$pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
	session_start();*/

	$title = 'Claires\'s Cars - Admin';
	$content = 
	'<main class="admin">

	<section class="left">
		<ul>
			<li><a href="manufacturers.php">Manufacturers</a></li>
			<li><a href="cars.php">Cars</a></li>

		</ul>
	</section>

	<section class="right">
	</section>
	</main>';

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


	
