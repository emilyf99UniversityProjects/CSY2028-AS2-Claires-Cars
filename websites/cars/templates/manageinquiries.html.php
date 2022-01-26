<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Inquiries</h2>
    <p>All the Customer inquiries are listed here.</p>

    <?php
    foreach ($inquiries as $inquiry) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4> Customer Name: ' . $inquiry['name'] . '</h4>';
		echo '<p> Customer Email: ' . $inquiry['email'] . '</p>';
        echo '<p> Customer Telephone: ' . $inquiry['telephone'] . '</p>';
        echo '<p> Inquiry: ' . $inquiry['inquiry'] . '</p>';
        echo '<td><form method="post" action="/inquiries/completeinquiries">
        <input type="hidden" name="inquiries[id]" value="' . $inquiry['id'] . '" />
        <input type="hidden" name="inquiries[completedby]" value="' . $_SESSION['username'] . '" />
        <input type="hidden" name="inquiries[completed]" value="1" />
        <input type="submit" name="submit" value="Complete" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }
     

    if(!$inquiries) {
    ?>
    <p>There are currently no Inquiries in the database.</p>
    <?php
    }
    ?>
</section>