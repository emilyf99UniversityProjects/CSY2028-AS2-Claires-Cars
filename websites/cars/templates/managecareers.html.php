<?php
//calls the admin sub navigation bar so the user can go back to the admin menu easily
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Careers</h2>
    <p>All the job listings currently on the ClairesCareers page are shown here.</p>
    <!--Add jobs link is before the records so it can easily be found by the admin -->
    <p><a href ="/jobs/editaddjobs">Add a New Job</a></p>

    <?php
     //for each job record found in the database it is displayed as a row in the table
    foreach ($jobs as $job) {
        echo '<table>';
		echo '<li>';
        echo '<tr>';
	 	echo '<td><div class="details">';
		echo '<h4> Job Title: ' . $job['title'] . '</h4>';
		echo '<p> Job Description: ' . $job['description'] . '</p>';
        echo '<p> Salary: ' . $job['salary'] . '</p></td>';
        echo '<p> Qualifications: ' . $job['qualifications'] . '</p></td>';
         //an edit button is displayed in each record that uses the job ID in the link to provide a unique record page
        echo '<td><p><a href ="/jobs/editaddjobs?id=' .$job['id'] . '">Edit This Job</a></p></td>';
        //delete function is on a link, rather than open a new page when clicked it deletes the delete straight away
        echo '<td><form method = "post" action = "/jobs/deletejobposting">
        <input type = "hidden" name = "id" value = "' . $job['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete This Job Post" />
        </form></td>';
		echo '</div>';
        echo '</tr>';
	 	echo '</li>';
        echo '</table>';
	 }
     /*if there a no job records found a message is displayed to the user so they have a physical prompt to look at 
      and are not confused by a blank page*/
    if(!$jobs) {
    ?>
    <p>There are currently no Jobs in the database, Please add a Job or contact support.</p>
    <?php
    }
    ?>
</section>