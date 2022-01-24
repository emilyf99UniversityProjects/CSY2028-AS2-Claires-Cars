<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Manufacturers</h2>
    <p>All the Manufacuturers are listed here.</p>
    <p><a href ="/manufacturers/editaddmanufacturer">Add a new Manufacturer</a></p>

    <?php
    foreach ($manufacturers as $manufacturer) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4>Name: ' . $manufacturer['name'] . '</h4></td>';
        echo '<td><p><a href ="/manufacturers/editaddmanufacturer?id=' .$manufacturer['id'] .'"> Edit this Manufacturer</a></p></td>';
        echo '<td><form method = "post" action = "/manufacturers/deletemanufacturer">
        <input type = "hidden" name = "id" value = "'.$manufacturer['id'].'"/>
        <input type = "submit" name = "submit" value= "Delete Manufacturer" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }

    if(!$manufacturer) {
    ?>
    <p>There are currently no Manufacturers in the database.</p>
    <?php
    }
    ?>
</section>