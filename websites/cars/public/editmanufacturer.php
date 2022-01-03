<?php
	require 'databasejoin.php';
	require 'loadTemplate.php';
	
	$content=  
	loadTemplate('../templates/leftsectionadmin.html.php') .
		'<section class="right">
		</section>';
	

	$title ='Claires\'s Cars - Admin';
	$class ='admin';
	require '../templates/layout.html.php';

	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('UPDATE manufacturers SET name = :name WHERE id = :id ');

		$criteria = [
			'name' => $_POST['name'],
			'id' => $_POST['id']
		];

		$stmt->execute($criteria);
		echo 'Manufacturer Saved';
	}
	else {
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$currentMan = $pdo->query('SELECT * FROM manufacturers WHERE id = ' . $_GET['id'])->fetch();
		?>


			<h2>Edit Manufacturer</h2>

			<form action="" method="POST">

				<input type="hidden" name="id" value="<?php echo $currentMan['id']; ?>" />
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $currentMan['name']; ?>" />


				<input type="submit" name="submit" value="Save Manufacturer" />

			</form>
			

		<?php
		}

		else {
			$content =
		loadTemplate('../templates/loginform.html.php');
		}

	} 
	?>

	
