<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Admins</h2>
    <p>Please do not leave this screen on display as non-admins can change passwords</p>
    <!--Add admin link is before the records so it can easily be found by the admin -->
    <p><a href ="/admins/editaddadmin">Add a New Admin</a></p>

    <?php
    //for each admin record found in the database it is displayed as a row in the table
    foreach ($admins as $admin) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4> Username: ' . $admin['username'] . '</h4>';
        //an edit button is displayed in each record that uses the admin ID in the link to provide a unique record page
        echo '<td><p><a href ="/admins/editaddadmin?id=' .$admin['id'] .'">Edit This Admin</a></p></td>';
        //delete function is on a link, rather than open a new page when clicked it deletes the admin straight away
        echo '<td><form method = "post" action = "/admins/deleteadmin">
        <input type = "hidden" name = "id" value = "' . $admin['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete Admin" />
        </form></td>';
        echo '</tr>';
		echo '</div>';
	 	echo '</li>';
        echo '</table>';
	 }

    /*if there a no admin records found a message is displayed to the user so they have a physical prompt to look at 
      and are not confused by a blank page*/
    if(!$admins) {
    ?>
    <p>There are currently no Admins in the database, Please Add a Admin or Contact Support.</p>
    <?php
    }
    ?>
</section>;