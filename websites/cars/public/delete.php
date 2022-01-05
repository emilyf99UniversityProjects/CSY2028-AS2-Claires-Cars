<?php
	require '../../databasejoin.php';
	require 'openingHours.php';
	require '../../loadTemplate.php';
	
	$content=  
	loadTemplate('../templates/leftsectionadmin.html.php') .
		'<section class="right">' . $deleteCompleteText .
		'</section>';
	
	$title ='Claires\'s Cars - Admin';
	$class = 'admin';
	require '../templates/layout.html.php';

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

			$delete->delete($_POST['id']);

			echo $deleteCompleteText;

		}

		else {
			$content =
		loadTemplate('../templates/loginform.html.php');
		}
	?>