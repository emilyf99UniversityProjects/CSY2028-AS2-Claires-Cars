
<h1>Claire's Careers</h1>
<?php 
//the foreach loop is used to generate a display for every job record found in the job table
//echos are used to pull out each tables attributes
foreach ($jobs as $job) {
		echo '<li>';
	 	echo '<div class="details">';
		echo '<h2>' . $job['title'] . ' ' . '</h2>';
		echo '<p>Description: ' . $job['description'] . '</p>';
		echo '<p>Salary: £' . $job['salary'] . '</p>';
		echo '<p>Qualifications Needed : ' . $job['qualifications'] . '</p>';
		echo '</div>';
	 	echo '</li>';
	 }

//if there are not jobs found a message will be displayed, this is to help the user understand why there is no records
if(!$jobs) {
    ?>
    <p>Claire's Cars currently has no job opportunities available, but keep checking as new positions become 
    available regularly!</p>
<?php
}
?>