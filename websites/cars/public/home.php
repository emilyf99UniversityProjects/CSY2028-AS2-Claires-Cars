<?php 
    require 'databasejoin.php';
    require 'loadTemplate.php';
    require 'openingHours.php';
    
	$content = 
	loadTemplate('../templates/home.html.php');

    $title = 'Claires\'s Cars - Contact Us';
    $class = 'about';
	require '../templates/layout.html.php';
?>