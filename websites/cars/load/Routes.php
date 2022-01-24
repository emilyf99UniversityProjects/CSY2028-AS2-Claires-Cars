<?php
   
	namespace load;
	class Routes implements \CSY2028\Routes {
    	public function getController($name) {
    		require '../databasejoin.php';

			$carsconnect = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
			$inquiriesconnect = new \CSY2028\DatabaseTable($pdo, 'inquiries', 'id');
			$jobsconnect = new \CSY2028\DatabaseTable($pdo, 'jobs', 'id');
			$adminsconnect = new \CSY2028\DatabaseTable($pdo, 'admins', 'id');
			$newsconnect = new \CSY2028\DatabaseTable($pdo, 'news', 'id');
			$manufacturersconnect = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
		
			$controllers = [];
			$controllers['cars'] = new \load\controllers\Cars($carsconnect);
			$controllers['inquiries'] = new \load\controllers\Inquiries($inquiriesconnect);
			$controllers['jobs'] = new \load\controllers\Jobs($jobsconnect);
			$controllers['admins'] = new \load\controllers\Login($adminsconnect);
			$controllers['news'] = new \load\controllers\News($newsconnect);
			$controllers['manufacturers'] = new \load\controllers\Manufacturers($manufacturersconnect);
			

		return $controllers[$name];
	}	

	public function getDefaultRoute() {
    	return 'news/news';
	}

	//have to be an admin to be logged in 
 	public function checkLogin($route) {
 	session_start();
 	$loginRoutes = [];
	
 	$loginRoutes['manufacturers/manufacturers'] = true;
 	$loginRoutes['manufacturers/editManufacturer'] = true;
 	$loginRoutes['manufacturers/deleteManufacturer'] = true;

 	$loginRoutes['cars/editCars'] = true;
 	$loginRoutes['cars/deleteCars'] = true;

	 //add careers ones
	 //add news ones
	
	 $requiresLogin = $loginRoutes[$route] ?? false;

 		if ($requiresLogin && !isset($_SESSION['loggedin'])) {
    		header('location: /admins/login');
    		exit();  
 		} 
 	}
} 
?>