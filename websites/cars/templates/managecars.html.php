<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Cars</h2>
    <p>This is where all the cars in the showroom are displayed.</p>
    <p><a href ="">Add a Car</a></p>

    <?php
    foreach ($cars as $car) {
        /* Commented out temp due to image size
        if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
            echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
       }*/ 

		echo '<div class="details">';
		//echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		echo '<h2>' . $car['name'] . '</h2>';
		echo '<h3>Before Price: £' . $car['beforeprice'] . '</h3>';
		echo '<h3>Current Price: £' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';
		echo '<p> Mileage : ' . $car['mileage'] . ' miles</p>';
		echo '<p> Engine Type: ' . $car['engine'] . '</p>';
        echo '<p><a href = "">Edit Car</a></p>';
        echo '<p><a href = "">Delete Car(Cannot be undone)</a></p>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$cars) {
    ?>
    <p>There are currently no Cars in the database, Please add a Car.</p>
    <?php
    }
    ?>
</section>;