<?php 
    require 'databasejoin.php';
    require 'loadTemplate.php';
    require 'openingHours.php';
    
	$content = 
	'<form action="contact.php" method="POST" >
    <h2>Contact Us</h2>
    <h3>Enter your details below:</h3>

    <label>Name: </label> <input type="text" name = "name" />
    <label>Email: </label> <input type="text" name = "email" />
	<label>Telephone: </label> <input type="text" name = "telephone" />
	<label>Enquiry: </label> <textarea name = "enquiry" > </textarea>


    <input type="submit" name="submit" value="Submit" />
    </form>';

    $title = 'Claires\'s Cars - Contact Us';
    $class = 'contact';
	require '../templates/layout.html.php';
?>
