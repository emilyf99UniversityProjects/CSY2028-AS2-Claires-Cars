<?php 
	require 'leftsectioncars.html.php';
?>
<section class = "right">
	<h1>Our Cars</h1>

	<ul class = "cars">
<?php

	/*$cars = $pdo->prepare('SELECT * FROM cars LIMIT 10');
	 $manufacturer = $pdo->prepare('SELECT * FROM manufacturers WHERE id = :id');

	 $cars->execute();*/


	foreach ($cars as $car) {
		//$manu->execute(['id' => $car['manufacturerId']]);
		//$manufacturer = $manu->fetch();
		echo '<li>';

	if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
	 		echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
		}

	 	echo '<div class="details">';
		//echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		echo '<h3>£' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';

		echo '</div>';
	 	echo '</li>';
	 }
	?>
	</ul>
	</section>
