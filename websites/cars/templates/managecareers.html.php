<?php
require 'leftsectionadmin.html.php';
?>
<section class="right">
    <h2>Manage Careers</h2>
    <p>All the job listings currently on the ClairesCareers page are shown here.</p>
    <p><a href ="/jobs/editaddjobs">Add a New Job</a></p>

    <?php
    foreach ($jobs as $job) {
        echo '<table>';
		echo '<li>';
	 	echo '<div class="details">';
		echo '<td><h4> Job Title: ' . $job['title'] . '</h4></td>';
		echo '<td><p> Job Description: ' . $job['description'] . '</p></td>';
        echo '<td><p> Salary: ' . $job['salary'] . '</p></td>';
        echo '<td><p> Qualifications: ' . $job['qualifications'] . '</p></td>';
        echo '<td><p><a href ="/jobs/editaddjobs?id=' .$job['id'] . '">Edit This Job</a></p></td>';
        echo '<td><form method = "post" action = "/jobs/deletejobposting">
        <input type = "hidden" name = "id" value = "' . $job['id'] . '"/>
        <input type = "submit" name = "submit" value= "Delete This Job Post" />
        </form></td>';
		echo '</div>';
	 	echo '</li>';
        echo '</table>';
	 }

    if(!$jobs) {
    ?>
    <p>There are currently no Jobs in the database, Please add a Job or contact support.</p>
    <?php
    }
    ?>
</section>