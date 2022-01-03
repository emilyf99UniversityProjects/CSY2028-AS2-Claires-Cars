<?php
	require 'databasejoin.php';
	require 'loadTemplate.php';
	
	$content=  
	loadTemplate('../templates/leftsectionadmin.html.php') .
		'<section class="right">
		</section>';
	
	$title ='Claires\'s Cars - Admin';
	$class = 'admin';
	require '../templates/layout.html.php';

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$deleteCar->delete($_POST['id']);

			echo 'Car deleted';
		}

		else {
			$content =
		loadTemplate('../templates/loginform.html.php');
		} 
	?>

	
