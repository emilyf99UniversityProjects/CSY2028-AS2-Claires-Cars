<?php 
    require 'databasejoin.php';
    require 'loadTemplate.php';
    require 'openingHours.php';
    
	$content = 
	loadTemplate('../templates/contact.html.php');

    $title = 'Claires\'s Cars - Contact Us';
    $class = 'contact';
	require '../templates/layout.html.php';
?>
