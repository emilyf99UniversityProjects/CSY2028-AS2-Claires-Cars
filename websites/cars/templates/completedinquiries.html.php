<?php
//calls the admin subnavigation menu
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <!--This is outside the foreach loop so it is only called on the top of the page -->
    <h2>Completed Inquiries</h2>
    <p>All the Completed Customer inquiries are listed here.</p>

    <?php
    //for every inquiry found in the database the format below is displayed as a table row
    foreach ($inquiries as $inquiry) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<div class="details">';
		echo '<td><h4> Customer Name: ' . $inquiry['name'] . '</h4>';
		echo '<p> Customer Email: ' . $inquiry['email'] . '</p>';
        echo '<p> Customer Telephone: ' . $inquiry['telephone'] . '</p>';
        echo '<p> Inquiry: ' . $inquiry['inquiry'] . '</p>';
        echo '<p> Complete Date : ' . $inquiry['completeddate'] . '</p>';
        echo '<p> Complete By : ' . $inquiry['completedby'] . '</p></td>';
        echo '</tr>';
		echo '</div>';
	 	echo '</li>';
        echo '</table>';
	 }

    //if there are no inquiries a message is displayed to make it easier for the user. 
    if(!$inquiries) {
    ?>
    <p>There are currently no Completed Inquiries in the database.</p>
    <?php
    }
    ?>
</section>