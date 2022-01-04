<?php
class CarsController {
    private $carsconnect;

    public function __construct($carsconnect) {
    $this-> carsconnect = $carsconnect;
    }

    public function home(){
        $cars = $this->carsconnect->findAll();
        return [
        'template' => '../templates/index.html.php',
        'title' => 'Claires\'s Cars - Home', 'class' => 'home', 
        'variables' => [
            'cars' => $cars]
        ];

    }

    /*
    public function showroomlist() {
        $cars = $this->$carsconnect->findAll();
        return []
    }*/

   

}


?>