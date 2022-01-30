<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Manufacturers</h2>
    <p>All the Manufacuturers are listed here.</p>
    <!--Add manufacturer link is before the records so it can easily be found by the admin -->
    <p><a href ="/manufacturers/editaddmanufacturer">Add a new Manufacturer</a></p>

    <?php
    //for each manufacturer record found in the database it is displayed as a row in the table
    foreach ($manufacturers as $manufacturer) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4>Name: ' . $manufacturer['name'] . '</h4></td>';
        //an edit button is displayed in each record that uses the manufacturer ID in the link to provide a unique record page
        echo '<td><p><a href ="/manufacturers/editaddmanufacturer?id=' .$manufacturer['id'] .'"> Edit this Manufacturer</a></p></td>';
       //delete function is on a link, rather than open a new page when clicked it deletes the manufacturer straight away
        echo '<td><form method = "post" action = "/manufacturers/deletemanufacturer">
        <input type = "hidden" name = "id" value = "'.$manufacturer['id'].'"/>
        <input type = "submit" name = "submit" value= "Delete Manufacturer" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }
     /*if there a no manufacturer records found a message is displayed to the user so they have a physical prompt to look at 
      and are not confused by a blank page*/
    if(!$manufacturers) {
    ?>
    <p>There are currently no Manufacturers in the database.</p>
    <?php
    }
    ?>
</section>