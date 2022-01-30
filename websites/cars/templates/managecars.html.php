<?php
//for each car record found in the database it is displayed as a row in the table
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Cars</h2>
    <p>This is where all the cars in the showroom are displayed.</p>
    <!--Add cars link is before the records so it can easily be found by the admin -->
    <p><a href ="/cars/editaddcars">Add a Car</a></p>

    <?php
     //for each car record found in the database it is displayed as a row in the table
    foreach ($cars as $car) {
        
        echo '<table>';
        echo '<li>';
        echo '<tr>';
		echo '<div class="details">';
		echo '<td><h2>' . $car['name'] . '</h2>';
        //echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';

         //if there is a before price is not set or is set to 0 then the before price is not displayed
        if($car['beforeprice'] == !null || $car['beforeprice'] != 0 ) {
			echo '<h3>Before Price: £' . $car['beforeprice'] . '</h3>';
		}
		echo '<h3>Current Price: £' . $car['price'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';
		echo '<p> Mileage : ' . $car['mileage'] . ' miles</p>';
		echo '<p> Engine Type: ' . $car['engine'] . '</p></td>';
        echo '<td><form method="post" action="/cars/archive">
        <input type="hidden" name="cars[id]" value="' . $car['id'] . '" />
        <input type="hidden" name="cars[archived]" value="1" /> 
        <input type="submit" name="submit" value="Archive this Car" /> </form></td>';
        
       
        //an edit button is displayed in each record that uses the car ID in the link to provide a unique record page
        echo '<td><p><a href = "/cars/editaddcars?id=' .$car['id'] . '">Edit Car</a></p></td>';
        //delete function is on a link, rather than open a new page when clicked it deletes the car straight away
        echo '<td><form method = "post" action = "/cars/deletecar">
        <input type = "hidden" name = "id" value = "' . $car['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete Car" />
        </form></td>';

	 }
      /*if there a no job records found a message is displayed to the user so they have a physical prompt to look at 
      and are not confused by a blank page*/
    if(!$cars) {
    ?>
    <p>There are currently no Cars in the database, Please add a Car.</p>
    <?php
    }
    ?>
</section>