<?php
require '../../databasejoin.php';
require 'openingHours.php';
require '../../loadTemplate.php';
	
$content=  
loadTemplate('../templates/leftsectioncars.html.php') .
	'<section class="right">
		<h1>Aston Martin Cars</h1>
			<ul class="cars">
			</ul>
	</section>';

$title ='Claires\'s Cars - Aston Martin';
$class = 'admin';
require '../templates/layout.html.php';
	

	$cars = $pdo->prepare('SELECT * FROM cars WHERE manufacturerId = 4');
	$manu = $pdo->prepare('SELECT * FROM manufacturers WHERE id = :id');

	$cars->execute();


	foreach ($cars as $car) {
		$manu->execute(['id' => $car['manufacturerId']]);
		$manufacturer = $manu->fetch();
		echo '<li>';

		if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
			echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="images/cars/' . $car['id'] . '.jpg" /></a>';
		}

		echo '<div class="details">';
		echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		echo '<h3>£' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';

		echo '</div>';
		echo '</li>';
	}
	?>

