<?php
namespace CSY2028;
class EntryPoint {
 private $routes;
 public function __construct(\CSY2028\Routes $routes) {
 $this->routes = $routes;
 }
 public function run() {
 $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
 
 $this->routes->checkLogin($route);
 if ($route == '') {
    $route = $this->routes->getDefaultRoute();
 }
 
 list($controllerName, $functionName) = explode('/', $route);

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $functionName = $functionName . 'Submit';
 }

 $controller = $this->routes->getController($controllerName);
 $page = $controller->$functionName();

 $content = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
 $title = $page['title'];
 $class = $page['class'];
 require '../templates/layout.html.php';
 }
 
 public function loadTemplate($fileName, $templateVars) {
 extract($templateVars);
 ob_start();
 require $fileName;
 $contents = ob_get_clean();
 return $contents;

 /*generic page that can be reused on other sites for generating creating the pages without the index,
 the only thing you would need to change would be the require for the layout as that is the 
 index page layout that is used on every page*/
 }
}
?>
