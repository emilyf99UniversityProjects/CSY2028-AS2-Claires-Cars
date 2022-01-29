<?php
	namespace load;
	class Routes implements \CSY2028\Routes {
    	public function getController($name) {

			//Getting the databas connection
    		require '../databasejoin.php';

			//connecting the database tables to a variable and applying name spaces to them

			$carsconnect = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
			$inquiriesconnect = new \CSY2028\DatabaseTable($pdo, 'inquiries', 'id');
			$jobsconnect = new \CSY2028\DatabaseTable($pdo, 'jobs', 'id');
			$adminsconnect = new \CSY2028\DatabaseTable($pdo, 'admins', 'id');
			$newsconnect = new \CSY2028\DatabaseTable($pdo, 'news', 'id');
			$manufacturersconnect = new \CSY2028\DatabaseTable($pdo, 'manufacturers', 'id');
		
			//creating a controller for each table and creating a new instance of the database in that controller
			//namesapces are also applied
	
			$controllers = [];
			$controllers['cars'] = new \load\controllers\Cars($carsconnect, $manufacturersconnect);
			$controllers['inquiries'] = new \load\controllers\Inquiries($inquiriesconnect);
			$controllers['jobs'] = new \load\controllers\Jobs($jobsconnect);
			$controllers['admins'] = new \load\controllers\Login($adminsconnect);
			$controllers['news'] = new \load\controllers\News($newsconnect);
			$controllers['manufacturers'] = new \load\controllers\Manufacturers($manufacturersconnect);
			

		return $controllers[$name];

	}	

	/* Where a route cannot be found the user will be sent to news/news 
	This path is the path for the original index. It has been changed to news/news for clarity of what that page
	features, news is the controller and news is the home page that displays the news articles. */
	public function getDefaultRoute() {
    	return 'news/news';
	}
 
	/* Function is not needed but left in in case future sites need it */
	/* Can be used to stop users who aren't logged in from accessing pages */
 	public function checkLogin($route) {
 	session_start();
 	$loginRoutes = [];

	$requiresLogin = $loginRoutes[$route] ?? false;

 		if ($requiresLogin && !isset($_SESSION['loggedin'])) {
    		header('location: /admins/login');
    		exit();  
 		}  
 	}  
} 
?>