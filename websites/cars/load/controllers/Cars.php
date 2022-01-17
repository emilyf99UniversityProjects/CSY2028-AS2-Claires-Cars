<?php
namespace load\controllers;
class Cars {
    private $carsconnect;

    public function __construct($carsconnect) {
    $this-> carsconnect = $carsconnect;
    }

    public function home(){
        $cars = $this->carsconnect->findAll();
        return [
        'template' => 'home.html.php',
        'variables' => ['cars' => $cars],
        'title' => 'Claires\'s Cars - Home',
        'class' => 'home'
        ];

    }

    public function about(){
        $cars = $this ->carsconnect->findAll();
        return[
        'template' => 'about.html.php',
        'variables' => ['cars' => $cars], 
        'title' => 'Claires\'s Cars - About',
        'class' => 'about'
        ];
    }

    public function cars() {
        $cars = $this->carsconnect->find('archived', 0);
        return [
            'template' => 'cars.html.php',
            'variables' => ['cars' => $cars], 
            'title' => 'Claires\'s Cars - Our Cars',
            'class' => 'admin'
            ];
    }

    public function managearchivecars() {
        $cars = $this->carsconnect->find('archived', 1);
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managearchivecars.html.php',
                'variables' => ['cars' => $cars],
                'title' => 'Claire\'s Cars - Manage Archived Cars',
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