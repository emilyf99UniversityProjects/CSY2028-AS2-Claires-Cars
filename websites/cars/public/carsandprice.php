<?php
	require '../../databasejoin.php';
	require 'openingHours.php';
	require '../../loadTemplate.php';
	
	$content=  
	loadTemplate('../templates/leftsectionadmin.html.php')
	.
	loadTemplate('../templates/rightsection.html.php');

	$title ='Claires\'s Cars - Admin';
	$class = 'admin';
	require '../templates/layout.html.php';


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
			$content =
		loadTemplate('../templates/loginform.html.php');
		} 
	?>
	
