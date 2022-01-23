<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Archived Cars</h2>
    <p>This is where all the held cars are archived.</p>
    <p>These cars do not show up in the showroom.</p>
    <p><a href ="/cars/editaddcars">Add a Car to the Archive</a></p>

    <?php
    foreach ($cars as $car) {
        /* Commented out temp due to image size
        if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
            echo '<a href="images/cars/' . $car['id'] . '.jpg"><img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
       }*/ 

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
        echo '<p><a href = "/cars/editaddcars?id=' .$car['id'] .'">Edit the Car in the Archive</a></p>';
        echo '<td><form method = "post" action = "/cars/deletecar">
        <input type = "hidden" name = "id" value = "'.$car['id'].'"/>
        <input type = "submit" name = "submit" value= "Delete Archived Car" />
        </form></td>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$cars) {
    ?>
    <p>There are currently no Archived Cars in the database, Please Archive a Car.</p>
    <?php
    }
    ?>
</section>;