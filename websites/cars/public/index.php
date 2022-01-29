<?php
require '../autoload.php';


$routes = new \load\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();

/* This page is used to provide single point entry, 
this improves page security and calls the routes and entry point */
?>
