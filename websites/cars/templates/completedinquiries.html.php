<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Completed Inquiries</h2>

    <?php
    foreach ($inquiries as $inquiry) {
        echo '<p>All the Completed Customer inquiries are listed here.</p>';
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h4> Customer Name: ' . $inquiry['name'] . '</h4>';
		echo '<p> Customer Email: ' . $inquiry['email'] . '</p>';
        echo '<p> Customer Telephone: ' . $inquiry['telephone'] . '</p>';
        echo '<p> Inquiry: ' . $inquiry['inquiry'] . '</p>';
        echo '<p> Complete Date : ' . $inquiry['completeddate'] . '</p>';
        echo '<p> Complete By : ' . $inquiry['completedby'] . '</p>';
		echo '</div>';
	 	echo '</li>';
	 }

    if(!$inquiries) {
    ?>
    <p>There are currently no Completed Inquiries in the database.</p>
    <?php
    }
    ?>
</section>