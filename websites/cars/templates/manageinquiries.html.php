<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Inquiries</h2>
    <p>All the Customer inquiries are listed here.</p>

    <?php
     //for each inquiry record found in the database it is displayed as a row in the table
    foreach ($inquiries as $inquiry) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4> Customer Name: ' . $inquiry['name'] . '</h4>';
		echo '<p> Customer Email: ' . $inquiry['email'] . '</p>';
        echo '<p> Customer Telephone: ' . $inquiry['telephone'] . '</p>';
        echo '<p> Inquiry: ' . $inquiry['inquiry'] . '</p>';
        // When clicked this assigns the value of the inquiry to 1 which marks it as complete and moves it to a new list
        echo '<td><form method="post" action="/inquiries/completeinquiries">
        <input type="hidden" name="inquiries[id]" value="' . $inquiry['id'] . '" />
        <input type="hidden" name="inquiries[completed]" value="1" />
        <input type="submit" name="submit" value="Complete" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }
     
    /*if there a no inquiry records found a message is displayed to the user so they have a physical prompt to look at 
      and are not confused by a blank page*/
    if(!$inquiries) {
    ?>
    <p>There are currently no Inquiries in the database.</p>
    <?php
    }
    ?>
</section>