<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Inquiries</h2>
    <p>All the Customer inquiries are listed here.</p>

    <?php
    foreach ($inquiries as $inquiry) {
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4> Customer Name: ' . $inquiry['name'] . '</h4>';
		echo '<p> Customer Email: ' . $inquiry['email'] . '</p>';
        echo '<p> Customer Telephone: ' . $inquiry['telephone'] . '</p>';
        echo '<p> Inquiry: ' . $inquiry['inquiry'] . '</p>';
        echo '<p> Complete: ' . $inquiry['completed'] . '</p>';
        echo '<p><a href ="/inquiries/completeinquiries?id=' .$inquiry['id'] .'">Complete This Inquiry</a></p>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$inquiries) {
    ?>
    <p>There are currently no Inquiries in the database.</p>
    <?php
    }
    ?>
</section>