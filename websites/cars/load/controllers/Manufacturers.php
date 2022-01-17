<?php
namespace load\controllers;
class Manufacturers {
    private $manufacturerconnect;

    public function __construct($manufacturerconnect) {
    $this-> manufacturerconnect = $manufacturerconnect;
    }

    public function managemanufacturers() {
        $manufacturers = $this->manufacturerconnect->findAll();
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managemanufacturers.html.php',
                'variables' => ['manufacturers' => $manufacturers],
                'title' => 'Claire\'s Cars - Manage Manufacturers',
                'class' => 'admin'
            ];
        }
        else {
            return [
                'template' => 'loginerror.html.php',
                'variables' => [''],
                'title' => 'Claire\'s Cars - Login Error',
                'class' => 'admin'
            ];
        }
    }
}
?>