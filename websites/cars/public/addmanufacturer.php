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

	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO manufacturers (name) VALUES (:name)');

		$criteria = [
			'name' => $_POST['name']
		];

		$stmt->execute($criteria);
		echo 'Manufacturer added';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Add Manufacturer</h2>

			<form action="" method="POST">
				<label>Name</label>
				<input type="text" name="name" />


				<input type="submit" name="submit" value="Add Manufacturer" />

			</form>
			

		<?php
		}

		else {
			$content =
		loadTemplate('../templates/loginform.html.php');
		}

	}
	?>

	
