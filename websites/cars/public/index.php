<?php
	require 'sessionstart.php';
	require 'loadTemplate.php';
	require 'openingHours.php';
	require '../functions/functions.php';
	require '../controllers/CarsController.php';

	$Cars = new DatabaseTable($pdo, 'cars', 'id');
	$CarsController = new CarsController($Cars);

	$Admins = new DatabaseTable($pdo, 'admins', 'id');
	$LoginController = new LoginController($Admins);

	$Manufacturers = new DatabaseTable($pdo, 'manufacturers', 'id');
	$ManufacturersController = new ManufacturersController($Manufacturers);

	$Jobs = new DatabaseTable($pdo, 'jobs', 'id');
	$JobController = new ManufacturersController($Jobs);

	$News = new DatabaseTable($pdo, 'news', 'id');
	$NewsController = new NewsController($News);

	$Inquiries = new DatabaseTable($pdo, 'inquiries', 'id');
	$InquiriesController = new InquiriesController($Inquiries);


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