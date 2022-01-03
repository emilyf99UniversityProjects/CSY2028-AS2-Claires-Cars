<?php
	require 'databasejoin.php';
	require 'loadTemplate.php';
	
	$content=  
	loadTemplate('../templates/leftsectionadmin.html.php') .
		'<section class="right">
		</section>';
	
	$title ='Claires\'s Cars - Admin';
	$class = 'admin';
	require '../templates/layout.html.php';

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$deleteCar->delete($_POST['id']);

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
	?>


	
