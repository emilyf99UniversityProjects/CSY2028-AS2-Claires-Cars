<?php 
	require 'leftsectioncars.html.php';
?>
<section class = "right">
	<h1>Our Cars</h1>

	<ul class = "cars">
<?php

	foreach ($cars as $car) {
		//$manu->execute(['id' => $car['manufacturerId']]);
		//$manufacturer = $manu->fetch();
		echo '<table>';
		echo '<li>';

	if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
	 		echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
		}

	 	echo '<div class="details">';
		//echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		echo '<h2>' . $car['name'] . '</h2>';
		if($car['beforeprice'] == !null) {
			echo '<h3>Before Price: £' . $car['beforeprice'] . '</h3>';
		}
		echo '<h3>Current Price: £' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';
		echo '<p> Mileage : ' . $car['mileage'] . ' miles</p>';
		echo '<p> Engine Type: ' . $car['engine'] . '</p>';

		echo '</div>';
	 	echo '</li>';
		echo '<table>';
	 }
	?>
	</ul>
	</section>
