<?php
	require 'sessionstart.php';
	require 'loadTemplate.php';
	require 'openingHours.php';
	require 'databasejoin.php';
	require 'functions/functions.php';
	require 'controllers/CarsController.php';
	require 'controllers/InquiriesController.php'; 
	require 'controllers/JobsController.php';
	require 'controllers/LoginController.php';
	require 'controllers/NewsController.php';
	
	//require 'controllers/ManufacturersController.php';

	$carsconnect = new DatabaseTable($pdo, 'cars', 'id');
	$inquiriesconnect = new DatabaseTable($pdo, 'inquiries', 'id');
	$jobconnect = new DatabaseTable($pdo, 'jobs', 'id');
	$adminconnect = new DatabaseTable($pdo, 'admins', 'id');
	$newsconnect = new DatabaseTable($pdo, 'news', 'id');
	

	$controllers = [];
	$controllers['cars'] = new CarsController($carsconnect);
	$controllers['inquiries'] = new InquiriesController($inquiriesconnect);
	$controllers['jobs'] = new JobsController($jobconnect);
	$controllers['admins'] = new LoginController($adminconnect);
	$controllers['news'] = new NewsController($newsconnect);
	

	/*
	$Manufacturers = new DatabaseTable($pdo, 'manufacturers', 'id');
	$ManufacturersController = new ManufacturersController($Manufacturers);

	*/

	$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
	if ($route == '') {
			$page = $controllers['cars']->home();
	}
	else {
			list($controllerName, $functionName) = explode('/', $route);
			$controller = $controllers[$controllerName];
			$page = $controller->$functionName();
	
	}
	
	$content = loadTemplate('../templates/' . $page['template'], $page['variables']);
	$title = $page['title'];
	$class = $page['class'];

	require '../templates/layout.html.php';
?>