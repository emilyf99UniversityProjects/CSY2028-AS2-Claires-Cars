<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Inquiries</h2>

    <?php
    foreach ($inquiries as $inquiry) {
        echo '<p>All the Customer inquiries are listed here.</p>';
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4> Customer Name: ' . $inquiry['name'] . '</h4>';
		echo '<p> Customer Email: ' . $inquiry['email'] . '</p>';
        echo '<p> Customer Telephone: ' . $inquiry['telephone'] . '</p>';
        echo '<p> Inquiry: ' . $inquiry['inquiry'] . '</p>';
        echo '<p><a href ="">Complete This Inquiry</a></p>';
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