<?php 
foreach ($jobs as $job) {
		echo '<li>';

	 	echo '<div class="details">';
		echo '<h2>' . $job['title'] . ' ' . '</h2>';
		echo '<p>Description: ' . $job['description'] . '</p>';
		echo '<p>Salary: ' . $job['salary'] . '</p>';
		echo '<p>Qualifications Needed : ' . $job['qualifications'] . '</p>';
		echo '</div>';
	 	echo '</li>';
	 }
if(!$jobs) {
    ?>
    <h1>Claire's Careers</h1>
    <p>Claire's Cars currently has no job opportunities available, but keep checking as new positions become 
    available regularly!</p>
<?php
}
?>