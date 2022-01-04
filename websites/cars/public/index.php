<?php
	require 'sessionstart.php';
	require 'loadTemplate.php';
	require 'openingHours.php';
	require '../functions/functions.php';
	require '../controllers/CarsController.php';

	$getDatabaseFunctions = new DatabaseTable($pdo, 'cars', 'id');
	$CarsContoller = new CarsController($getDatabaseFunctions);

	if ($_SERVER['REQUEST_URI'] !== '/') {
		$functionName = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		$page = $CarsController->$functionName();
	}
	
	else {
	$page = $CarsController->home();
	}

	$content =
		 '<p>Welcome to Claire\'s Cars, Northampton\'s specialist in classic and import cars.</p>';
		 
	$title = 'Claires\'s Cars - Home';
	$class = 'home';
	require '../templates/layout.html.php';
?>