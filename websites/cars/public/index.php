<?php
	require 'sessionstart.php';
	require 'loadTemplate.php';
	require 'openingHours.php';
	require 'databasejoin.php';
	require 'functions/functions.php';
	require 'controllers/CarsController.php';
	require 'controllers/LoginController.php';
	/*
	require 'controllers/ManufacturersController.php';
	require 'controllers/JobController.php';
	require 'controllers/NewsController.php';
	require 'controllers/InquiriesController.php'; */

	$carsconnect = new DatabaseTable($pdo, 'cars', 'id');
	$CarsController = new CarsController($carsconnect);
	
	$adminconnect = new DatabaseTable($pdo, 'admins', 'id');
	$LoginController = new LoginController($adminconnect);

	/*

	$Manufacturers = new DatabaseTable($pdo, 'manufacturers', 'id');
	$ManufacturersController = new ManufacturersController($Manufacturers);

	$jobconnect = new DatabaseTable($pdo, 'jobs', 'id');
	$JobController = new JobController($jobconnect);

	$newsconnect = new DatabaseTable($pdo, 'news', 'id');
	$NewsController = new NewsController($newsconnect);

	$inquiriesconnect = new DatabaseTable($pdo, 'inquiries', 'id');
	$InquiriesController = new InquiriesController($inquiriesconnect); */


	if ($_SERVER['REQUEST_URI'] !== '/') {
		$functionName = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		$page = $CarsController->$functionName();
	}
	
	else {
	$page = $CarsController->home();
	}

	$content = loadTemplate('../templates/' . $page['template'], $page['variables']);
	$title = $page['title'];
	$class = $page['class'];

	require '../templates/layout.html.php';
?>