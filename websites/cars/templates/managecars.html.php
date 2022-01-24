<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Cars</h2>
    <p>This is where all the cars in the showroom are displayed.</p>
    <p><a href ="/cars/editaddcars">Add a Car</a></p>

    <?php
    foreach ($cars as $car) {
        /* Commented out temp due to image size
        if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
            echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
       }*/ 
        echo '<table>';
        echo '<li>';
        echo '<tr>';
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
        echo '<td><p><a href = "/cars/editaddcars?id=' .$car['id'] . '">Edit Car</a></p></td>';
        echo '<td><form method = "post" action = "/cars/deletecar">
        <input type = "hidden" name = "id" value = "' . $car['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete Car" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }

    if(!$cars) {
    ?>
    <p>There are currently no Cars in the database, Please add a Car.</p>
    <?php
    }
    ?>
</section>;