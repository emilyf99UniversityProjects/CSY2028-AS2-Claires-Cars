<?php
require '../autoload.php';


$routes = new \load\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();
?>
