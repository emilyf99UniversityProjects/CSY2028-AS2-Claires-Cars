<?php
	require 'databasejoin.php';
	require 'openingHours.php';
	require 'loadTemplate.php';
	
	$content=  
	loadTemplate('../templates/leftsectionadmin.html.php') .
		'<section class="right">
		</section>';
	
	$title ='Claires\'s Cars - Admin';
	$class = 'admin';
	require '../templates/layout.html.php';

	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO cars (name, description, price, manufacturerId) 
							   VALUES (:model, :description, :price, :manufacturerId)');

		$criteria = [
			'model' => $_POST['model'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'manufacturerId' => $_POST['manufacturerId']
		];

		$stmt->execute($criteria);

		if ($_FILES['image']['error'] == 0) {
			$fileName = $pdo->lastInsertId() . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../images/cars/' . $fileName);
		}

		echo 'Car added';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Add Car</h2>

			<form action="addcar.php" method="POST" enctype="multipart/form-data">
				<label>Car Model</label>
				<input type="text" name="model" />

				<label>Description</label>
				<textarea name="description"></textarea>

				<label>Price</label>
				<input type="text" name="price" />

				<label>Category</label>

				<select name="manufacturerId">
				<?php
					$stmt = $pdo->prepare('SELECT * FROM manufacturers');
					$stmt->execute();

					foreach ($stmt as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
					}

				?>

				</select>

				<label>Image</label>

				<input type="file" name="image" />

				<input type="submit" name="submit" value="Add Car" />

			</form>
			
		<?php
		}

		else {
			$content =
		loadTemplate('../templates/loginform.html.php');
		}
	}
	?>


