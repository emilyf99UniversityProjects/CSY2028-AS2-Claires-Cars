<?php
	/*
	$pdo = new PDO('mysql:dbname=cars;host=mysql', 'student', 'student');
	session_start(); */
	
	$title = 'Claires\'s Cars - Admin';

	$content= 
	'<main class="admin">

	<section class="left">
		<ul>
			<li><a href="manufacturers.php">Manufacturers</a></li>
			<li><a href="cars.php">Cars</a></li>

		</ul>
	</section>

	<section class="right">
	</section>
	</main>	';

	require '../templates/layout.html.php';

	/*
	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Manufacturers</h2>

			<a class="new" href="addmanufacturer.php">Add new manufacturer</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$categories = $pdo->query('SELECT * FROM manufacturers');

			foreach ($categories as $category) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>';
				echo '<td><a style="float: right" href="editmanufacturer.php?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="deletemanufacturer.php">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
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

			<form action="index.php" method="post">
				<label>Username</label>
				<input type="text" name="username" />

				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		} */
	?>

	
