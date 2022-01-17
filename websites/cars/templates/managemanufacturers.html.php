<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Manufacturers</h2>
    <p>All the Manufacuturers are listed here.</p>
    <p><a href ="">Add a new Manufacturer</a></p>

    <?php
    foreach ($manufacturers as $manufacturer) {
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4>Name: ' . $manufacturer['name'] . '</h4>';
        echo '<p><a href ="">Edit this Manufacturer</a></p>';
        echo '<p><a href ="">Delete this Manufacturer</a></p>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$manufacturer) {
    ?>
    <p>There are currently no Manufacturers in the database.</p>
    <?php
    }
    ?>
</section>