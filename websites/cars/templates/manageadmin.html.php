<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Admins</h2>
    <p>Please do not leave this screen on display in public eye as passwords are listed</p>

    <?php
    foreach ($admins as $admin) {
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4> Username: ' . $admin['username'] . '</h4>';
		echo '<h4> Password: ' . $admin['password'] . '</h4>';
        echo '<p><a href ="">Edit</a></p>';
        echo '<p><a href ="">Delete</a></p>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$admins) {
    ?>
    <p>There are currently no Admins in the database, Please try again or contact support.</p>
    <?php
    }
    ?>
</section>;