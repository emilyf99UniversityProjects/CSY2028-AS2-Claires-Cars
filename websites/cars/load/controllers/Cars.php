<?php
namespace load\controllers;
class Cars {
    private $carsconnect;
    private $manufacturersconnect;

    public function __construct($carsconnect, $manufacturersconnect) {
    $this-> carsconnect = $carsconnect;
    $this-> manufacturersconnect = $manufacturersconnect;
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
        $manufacturer = $this->manufacturersconnect->findAll();
        //$pagination = $this ->carsconnect->pagination();
        return [
            'template' => 'cars.html.php',
            'variables' => ['cars' => $cars, 'manufacturers' => $manufacturer], 
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

    public function deletecarSubmit() {
        $cars = $this ->carsconnect->delete($_POST['id']);
 
        return [
            'template' => 'delete.html.php',
            'variables' => ['cars' => $cars],
            'title' => 'Claire\'s Cars - Deleted Successfully',
            'class' => 'admin'
        ];
    
    }

    public function editaddcarsSubmit() {

        if(isset($_POST['submit'])) {
            $cars = $_POST['cars'];
            
            if ($cars['id'] == '') {
                $cars['id'] = null;
            }

            $this->carsconnect->save($cars);
            
            return [
                'template' => 'editaddcars.html.php',
                'variables' => ['cars' => $cars],
                'title' => 'Claire\'s Cars - Edit and Add Cars',
                'class' => 'admin'
            ];

        }
    }

    public function editaddcars() {
        if(isset($_GET['id'])) {
            $find = $this->carsconnect->find('id', $_GET['id']);

            $cars = $find[0];
        }

        else {
            $cars = false;
        }

        return [
            'template' => 'editaddcars.html.php',
            'variables' => ['cars' => $cars],
            'title' => 'Claire\'s Cars - Edit and Add Cars',
            'class' => 'admin'
        ];
    }

     public function manufacturers(){
        $manufacturers = $this->manufacturersconnect->findAll();
        $cars = $this->carsconnect->find('manufacturerId', $_GET['id']);
        

        return [
            'template' => 'cars.html.php',
            'variables' => ['manufacturers' => $manufacturers, 'cars' => $cars],
            'title' => $_GET['name'],
            'class' => 'admin'
        ];

    }


}


?> 