<section class="left">
	<ul>
        <?php
		/*this for each loop is used to set  the url to the to the manufacture ID and Name . 
		  Without this when the manufactures do not disply on the car side menu.*/
		foreach ($manufacturers as $manufacturer) {
				echo '<li><a href=/cars/manufacturers?id=' . $manufacturer['id'] . '&name=' . $manufacturer['name'] . '>' . $manufacturer['name'] . '</a></li>';
			} ?> 		
	</ul>
</section>
	

<section class = "right">
	<h1>Our Cars</h1>

	<ul class = "cars">
<?php
	//the foreach loop is used to generate a display for every car found in the car table
	foreach ($cars as $car) {
		/*this if statement ensures that only cars that are not in the archive are displayed. 
		value of 0 is used for not in the archive */
		if ($car['archived'] == 0) {

			//echos the record in a table so it is displayed consistently
			echo '<table>';
			echo '<li>';

			/*Looks for any images that have the same number as the id of the car in the cars folder within the images folder 
			If one is found it displays that image using the echo */
			if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
	 			echo '<img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
			}
			
	 		echo '<div class="details">';

			 //car name in the header of the record
			echo '<h2>' . $car['name'] . '</h2>';
			
			/*this if statment searches for a before price
			If the before price is not set to null it will display the record.
			 If it is null it will not action the echo. */
			if($car['beforeprice'] == !null  || $car['beforeprice'] != 0) {
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
	}

	?>
	</ul>
	</section>
