<?php
namespace CSY2028;
interface Routes {
    //public function getPage($route);
    public function getController($name);
    public function getDefaultRoute();
    public function checkLogin($route);
}
?>