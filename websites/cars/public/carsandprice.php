<?php
	/* $pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
	session_start();*/

	$title = 'Claires\'s Cars - Admin';

	$content = 
	'<main class="admin">

	<!-- insert left section admin template -->

	<section class="right">
	
	</section>
	</main>';

	require '../templates/layout.html.php';
	/*
	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Cars</h2>

			<a class="new" href="addcar.php">Add new car</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Model</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$cars = $pdo->query('SELECT * FROM cars');

			foreach ($cars as $car) {
				echo '<tr>';
				echo '<td>' . $car['name'] . '</td>';
				echo '<td>£' . $car['price'] . '</td>';
				echo '<td><a style="float: right" href="editcar.php?id=' . $car['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deletecar.php">
				<input type="hidden" name="id" value="' . $car['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

		}

		else {
			?>
			<h2>Log in</h2>

			<form action="admin.php" method="post">
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		} */
	?>
	
