<?php
class CarsController {
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
        $cars = $this->carsconnect->findAll();
        return [
            'template' => 'cars.html.php',
            'variables' => ['cars' => $cars], 
            'title' => 'Claires\'s Cars - Our Cars',
            'class' => 'admin'
            ];
    }

   

}


?>