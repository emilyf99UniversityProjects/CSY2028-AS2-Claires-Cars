<?php
$match = true;
$title = 'Claire\'s Careers';
$class = 'jobs';
$content = '';
require 'databasejoin.php';
require 'openingHours.php';
require 'loadTemplate.php';
require '../templates/layout.html.php';

if ($match = true) {
    /* search through all records */
    $content = 
'<h1>Claire\'s Careers</h1>
<p>Records Found Test</p>';
}


else {
    $content = 
'<h1>Claire\'s Careers</h1>
<p>Claire\'s Cars currently has no job opportunities available, but keep checking as new positions become 
available regularly!</p>';
}
?>