<?php
namespace CSY2028;
interface Routes {
    public function getController($name);
    public function getDefaultRoute();
    public function checkLogin($route);
}
/*Generic function that is combined with the entry point and can be reused on other sites */
?>