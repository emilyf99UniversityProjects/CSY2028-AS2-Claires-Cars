<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Admins</h2>
    <p>Please do not leave this screen on display in public eye as passwords are listed</p>
    <p><a href ="/admins/editaddadmin">Add a New Admin</a></p>

    <?php
    foreach ($admins as $admin) {
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4> Username: ' . $admin['username'] . '</h4>';
		echo '<h4> Password: ' . $admin['password'] . '</h4>';
        echo '<p><a href ="/admins/editaddadmin?id=' .$admin['id'] .'">Edit This Admin</a></p>';
        echo '<td><form method = "post" action = "/admins/deleteadmin">
        <input type = "hidden" name = "id" value = "' . $admin['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete Admin" />
        </form></td>';
        echo '<tr>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$admins) {
    ?>
    <p>There are currently no Admins in the database, Please Add a Admin or Contact Support.</p>
    <?php
    }
    ?>
</section>;