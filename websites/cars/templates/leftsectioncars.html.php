<section class="left">
	<ul>
<?php
foreach ($manufacturers as $manufacturer) {
		
	echo '<li>';
	echo '<a href = "/manufacturers/findmanufacturers/?name=' . $manufacturer['name'] . '&id=' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</a>';
	echo '</li>';
}

?>
	</ul>
</section>
