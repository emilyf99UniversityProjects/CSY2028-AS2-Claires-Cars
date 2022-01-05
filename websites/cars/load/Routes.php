<?php

    namespace load; 
    class Routes implements \CSY2028\Routes {
        public function getPage($route) {
        require '../databasejoin.php';
        

	$carsconnect = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
	$inquiriesconnect = new \CSY2028\DatabaseTable($pdo, 'inquiries', 'id');
	$jobconnect = new \CSY2028\DatabaseTable($pdo, 'jobs', 'id');
	$adminconnect = new \CSY2028\DatabaseTable($pdo, 'admins', 'id');
	$newsconnect = new \CSY2028\DatabaseTable($pdo, 'news', 'id');
	$manufacturersconnect = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');

	$controllers = [];
	$controllers['cars'] = new \load\controllers\Cars($carsconnect);
	$controllers['inquiries'] = new \load\controllers\Inquiries($inquiriesconnect);
	$controllers['jobs'] = new \load\controllers\Jobs($jobconnect);
	$controllers['admins'] = new \load\controllers\Login($adminconnect);
	$controllers['news'] = new \load\controllers\News($newsconnect);
	$controllers['manufacturers'] = new \load\controllers\News($manufacturersconnect);
	
	if ($route == '') {
			$page = $controllers['cars']->home();
	}
	else {
			list($controllerName, $functionName) = explode('/', $route);
			$controller = $controllers[$controllerName];
			$page = $controller->$functionName();
	}
	
	return $page;
    }
}
?>