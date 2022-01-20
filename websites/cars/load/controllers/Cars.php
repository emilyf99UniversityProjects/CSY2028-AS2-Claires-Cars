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
            'class' => 'home'
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

    public function managecars() {
        $cars = $this->carsconnect->find('archived', 0);
        if(isset($_SESSION['loggedin'])) {
            return [
                'template' => 'managecars.html.php',
                'variables' => ['cars' => $cars],
                'title' => 'Claire\'s Cars - Manage Cars',
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

    public function deletearchivedcarSubmit() {
        $cars = $this ->carsconnect->delete($_POST['id']);
 
        return [
            'template' => 'delete.html.php',
            'variables' => ['cars' => $cars],
            'title' => 'Claire\'s Cars - Deleted Successfully',
            'class' => 'admin'
        ];
    
    }

}


?> 